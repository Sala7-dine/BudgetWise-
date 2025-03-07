<?php

namespace App\Console\Commands;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Console\Command;

class ProcessAutoSavings extends Command{
    
    protected $signature = 'autosave:process';
    protected $description = 'Process automatic savings for goals';

    public function handle()
    {
        $goals = Goal::where('status', 'in_progress')
            ->where('auto_save_percentage', '>', 0)
            ->get();

        foreach ($goals as $goal) {
            $user = $goal->user;
            if (!$user->salary) continue;

            $savingAmount = ($user->salary * $goal->auto_save_percentage) / 100;
            
            // Vérifier si on ne dépasse pas le montant cible
            $remainingToTarget = $goal->target_amount - $goal->current_amount;
            $savingAmount = min($savingAmount, $remainingToTarget);

            if ($savingAmount > 0) {
                $goal->current_amount += $savingAmount;
                
                // Vérifier si l'objectif est atteint
                if ($goal->current_amount >= $goal->target_amount) {
                    $goal->status = 'completed';
                }
                
                $goal->save();
            }
        }

        $this->info('Auto-savings processed successfully.');
    }
}
