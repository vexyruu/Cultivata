<?php

namespace App\Http\Controllers;

use App\Models\Pot;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $allPots = Pot::with('plant')->where('status', '!=', 'Harvested')->get();-
        $totalPots = Pot::count();
        $plantVarieties = $allPots->pluck('plant_id')->unique()->count();
        $recentlyPlanted = Pot::where('planting_date', '>=', now()->subDays(7))->count();

        $wateringTasks = $allPots->filter(function ($pot) {
            if (!$pot->plant) return false;
            $frequency = $pot->plant->watering_frequency; 
            $isDue = !$pot->last_watered_at || 
                    $pot->last_watered_at->addDays($frequency)->isPast();
            return $isDue;
        });

        $harvestTasks = $allPots->filter(function ($pot) {
            if (!$pot->plant) return false;
            $harvestDays = $pot->plant->days_to_harvest;
            return $pot->planting_date->addDays($harvestDays)->isPast();
        });

        return view('dashboard', [
            'potCount' => $totalPots,
            'wateringTasks' => $wateringTasks,
            'harvestTasks' => $harvestTasks,
            'plantVarietyCount' => $plantVarieties,
            'recentlyPlantedCount' => $recentlyPlanted,
        ]);
    }
}
