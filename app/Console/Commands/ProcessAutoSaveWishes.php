<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Http\Controllers\WishController;

class ProcessAutoSaveWishes extends Command
{
    protected $signature = 'autosave:wishes';
    protected $description = 'Process automatic savings for wishes';

    public function handle()
    {
        // Sélectionner uniquement les utilisateurs avec un salaire défini
        User::whereHas('wishes', function($query) {
            $query->where('status', 'pending');
        })
        ->whereNotNull('salary')
        ->each(function ($user) {
            $controller = new WishController();
            $controller->processAutoSave($user);
        });
        
        $this->info('Automatic savings processed successfully.');
    }
}
