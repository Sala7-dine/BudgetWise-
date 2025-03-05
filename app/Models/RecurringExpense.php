<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecurringExpense extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'frequency',
        'day_of_month',
        'category_id',
        'last_generated'
    ];

    protected $casts = [
        'last_generated' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
