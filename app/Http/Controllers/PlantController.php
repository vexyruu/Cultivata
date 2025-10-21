<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    public function index(){
        $plants = Plant::orderBy('name')->paginate(6);
        return view('plants', ['plants' => $plants]);
    }
    public function create(){
        return view('createplant');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'watering_frequency' => 'required|integer|min:1',
            'days_to_harvest' => 'required|integer|min:1',
            'days_to_grow' => 'required|integer|min:1',
            'harvest_type' => 'required|in:single,continuous',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);
        Plant::create($validated);
        return redirect()->route('plants')->with('success', 'Plant created successfully');
    }
    public function show(Plant $plant){
        return view('showplant', ['plant' => $plant]);
    }
    public function destroy(Plant $plant){
        $plant->delete();
        return redirect()->route('plants')->with('success', $plant->name . ' and all its pots have been deleted.');
    }
}
