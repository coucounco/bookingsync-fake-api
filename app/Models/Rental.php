<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $casts = [
        'checkin_details' => 'array',
        'checkout_details' => 'array',
        'description' => 'array',
        'headline' => 'array',
        'price_public_notes' => 'array',
        'summary' => 'array',
        'website_url' => 'array',
    ];

    public function bedrooms() {
        return $this->hasMany(Bedroom::class);
    }

    public function bathrooms() {
        return $this->hasMany(Bathroom::class);
    }
}
