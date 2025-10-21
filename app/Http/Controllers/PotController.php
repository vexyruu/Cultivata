<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Pot;
use Carbon\Carbon;

class PotController extends Controller
{
    public function index(){
        $pots = Pot::with('plant')->orderBy('created_at', 'desc')->paginate(6);
        foreach ($pots as $pot) {
            $isDue = false;
            if ($pot->plant) {
                $frequency = $pot->plant->watering_frequency;
                $isDue = !$pot->last_watered_at || $pot->last_watered_at->addDays($frequency)->isPast();
            }
            $pot->watering_due = $isDue; 

            $isHarvestDue = false;
            if ($pot->plant && $pot->status !== 'Harvested') {
                $harvestDays = $pot->plant->days_to_harvest;
                $isHarvestDue = $pot->planting_date->addDays($harvestDays)->isPast();
            }
            $pot->harvest_due = $isHarvestDue;
        }
        return view('garden', ['pots' => $pots]);
    }
    public function create(){
        $plantTypes = Plant::orderBy('name')->get();
        return view('createpot', ['plantTypes' => $plantTypes]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'plant_id' => 'required|exists:plants,id',
            'planting_date' => 'required|date',
        ]);

        Pot::create([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'plant_id' => $validated['plant_id'],
            'planting_date' => $validated['planting_date'],
            'status' => 'Seeding',
        ]);

        return redirect()->route('garden')->with('success', 'Pot added to the garden');
    }
    public function water(Pot $pot){
        $pot->last_watered_at = Carbon::now();
        $pot->save();
        return redirect()->back()->with('success', $pot->name . ' has been watered!');
    }
    public function harvest(Pot $pot){
        $pot->load('plant');
        $pot->last_harvested_at = now();
        if ($pot->plant) {
            if ($pot->plant->harvest_type === 'single') {
                $pot->status = 'Harvested';
            } else {
                $pot->status = 'Seeding';
            }
        }
        $pot->save();
        return redirect()->back();
    }
    public function show(Pot $pot){
        $pot->load('plant');
        $isWateringDue = false;
        if ($pot->plant) {
            $frequency = $pot->plant->watering_frequency;
            $isWateringDue = !$pot->last_watered_at || 
                             $pot->last_watered_at->addDays($frequency)->isPast();
        }
        $isHarvestDue = false;
        if ($pot->plant) {
            $harvestDays = $pot->plant->days_to_harvest;
            $isHarvestDue = $pot->planting_date->addDays($harvestDays)->isPast();
        }
        return view('showpot', [
            'pot' => $pot,
            'isWateringDue' => $isWateringDue,
            'isHarvestDue' => $isHarvestDue,
        ]);
    }
    public function destroy(Pot $pot){
        $pot->delete();
        return redirect()->route('garden')->with('success', $pot->name . ' has been deleted.');
    }
}
