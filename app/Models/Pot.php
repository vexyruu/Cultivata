<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pot extends Model
{
    /** @use HasFactory<\Database\Factories\PotFactory> */

    use HasFactory;
    protected $fillable = [
        'plant_id',
        'name',
        'location',
        'planting_date',
        'last_watered_at',
        'last_fertilized_at',
        'last_harvested_at',
        'status',
    ];

    protected $casts = [
        'planting_date' => 'datetime',
        'last_watered_at' => 'datetime',
        'last_fertilized_at' => 'datetime',
        'last_harvested_at' => 'datetime',
    ];

    public function plant(): BelongsTo{
        return $this->belongsTo(Plant::class);
    }

    public function getComputedStatusAttribute(): string{
        if ($this->status === 'Harvested') {
            return 'Harvested';
        }
        if (!$this->plant) {
            return $this->status;
        }
        $plantedOn = $this->planting_date;
        $daysSincePlanted = $plantedOn->diffInDays(now());
        $daysToGrow = $this->plant->days_to_grow;
        $daysToHarvest = $this->plant->days_to_harvest;

        if ($daysSincePlanted >= $daysToHarvest) {
            return 'Ready to Harvest';
        }

        if ($daysSincePlanted >= $daysToGrow) {
            return 'Growing';
        }
        return 'Seeding';
    }
}
