<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mechanic_id',
        'user_id',
        'rating',
        'comment',
    ];

    /**
     * Relationships
     */

    // Review belongs to a Mechanic
    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }

    // Review belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessors & Mutators (Optional)
     */

    // Accessor for star rating
    public function getStarRatingAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }
}
