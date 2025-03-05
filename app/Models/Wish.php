<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    /** @use HasFactory<\Database\Factories\WishFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'estimated_cost',
        'priority',
        'status'
    ];

    protected $casts = [
        'estimated_cost' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
