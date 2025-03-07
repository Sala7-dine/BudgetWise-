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
        'saved_amount',
        'priority',
        'status',
        'auto_save_percentage',
    ];

    protected $casts = [
        'estimated_cost' => 'decimal:2',
        'saved_amount' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function processAutoSave($remainingBudget)
    {
        if ($this->status !== 'pending' || $this->auto_save_percentage <= 0) {
            return false;
        }

        $savingAmount = ($remainingBudget * $this->auto_save_percentage) / 100;
        $remainingToTarget = $this->estimated_cost - $this->saved_amount;
        $savingAmount = min($savingAmount, $remainingToTarget);

        if ($savingAmount > 0) {
            $this->saved_amount += $savingAmount;
            
            if ($this->saved_amount >= $this->estimated_cost) {
                $this->status = 'achieved';
            }
            
            return $this->save();
        }

        return false;
    }
}
