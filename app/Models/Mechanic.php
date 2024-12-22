<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mechanics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'phone',
        'latitude',
        'longitude',
        'rating',
    ];

    /**
     * Relationships (Optional)
     */

    // Example: If mechanics have orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Example: If mechanics have user reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Accessors & Mutators (Optional)
     */

    // Example: Combine latitude and longitude as a single location string
    public function getCoordinatesAttribute()
    {
        return "{$this->latitude}, {$this->longitude}";
    }
}
