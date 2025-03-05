<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class SalaryController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'salary_day' => 'required|integer|min:1|max:31',
        ]);

        $user = auth()->user();
        $user->update([
            'salary' => $validated['amount'],
            'salary_day' => $validated['salary_day'],
        ]);

        // Calculer la prochaine date de versement
        $nextSalaryDate = Carbon::create(null, null, $validated['salary_day']);
        if ($nextSalaryDate->isPast()) {
            $nextSalaryDate->addMonth();
        }

        return back()->with('success', 'Salaire mis à jour avec succès. Prochain versement prévu le ' . $nextSalaryDate->format('d/m/Y'));
    }
}
