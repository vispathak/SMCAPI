<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OemSpecs extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'oems_id',
        'model_name',
        'model_year',
        'price',
        'colors',
        'mileage',
        'power',
        'max_speed'
    ];
}
