<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Plant extends Model
{   
    /** @use HasFactory<\Database\Factories\PlantFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'watering_frequency',
        'days_to_harvest',
        'days_to_grow',
        'harvest_type',
    ];

    public function pot(): HasMany{
        return $this->hasOne(Pot::class);
    }
}
