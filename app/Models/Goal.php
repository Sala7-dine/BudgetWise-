<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    /** @use HasFactory<\Database\Factories\GoalFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'target_amount',
        'current_amount',
        'auto_save_percentage', 
        'deadline',
        'status'
    ];

    protected $casts = [
        'deadline' => 'date',
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProgressAttribute()
    {
        return ($this->current_amount / $this->target_amount) * 100;
    }

    public function processAutoSave()
    {
        if ($this->status !== 'in_progress' || $this->auto_save_percentage <= 0) {
            return false;
        }

        $user = $this->user;
        if (!$user->salary) {
            return false;
        }

        $savingAmount = ($user->salary * $this->auto_save_percentage) / 100;
        $remainingToTarget = $this->target_amount - $this->current_amount;
        $savingAmount = min($savingAmount, $remainingToTarget);

        if ($savingAmount > 0) {
            $this->current_amount += $savingAmount;
            
            if ($this->current_amount >= $this->target_amount) {
                $this->status = 'completed';
            }
            
            return $this->save();
        }

        return false;
    }
}
