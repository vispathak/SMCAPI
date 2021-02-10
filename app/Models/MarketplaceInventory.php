<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MarketplaceInventory extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'oem_specs_id',
        'kms',
        'major_scratches',
        'original_paint',
        'no_of_accidents',
        'previous_buyers',
        'registration_place'
    ];
}
