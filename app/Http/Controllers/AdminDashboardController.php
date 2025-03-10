<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Expense;
use App\Models\Goal;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $startOfMonth = $now->startOfMonth();

        // Statistiques des utilisateurs
        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', $now->month)->count();
        $activeUsers = User::has('expenses')->count();

        // Statistiques des revenus
        $averageSalary = User::whereNotNull('salary')
            ->where('salary', '>', 0)
            ->avg('salary');

        // Statistiques mensuelles
        $monthlyStats = DB::table('users')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', $now->year)
            ->groupBy('month')
            ->get();

        // Statistiques des transactions et économies
        $totalTransactions = Expense::sum('amount');
        $monthlyTransactions = Expense::whereMonth('created_at', $now->month)->sum('amount');
        $transactionGrowth = $this->calculateGrowthRate($monthlyTransactions, $totalTransactions);

        // Statistiques des catégories
        $categoryStats = Category::withCount('expenses')
            ->withSum('expenses', 'amount')
            ->orderBy('expenses_sum_amount', 'desc')
            ->get();

        $stats = [
            'users' => [
                'total' => $totalUsers,
                'new' => $newUsersThisMonth,
                'active' => $activeUsers,
                'growthRate' => $totalUsers > 0 ? ($newUsersThisMonth / $totalUsers) * 100 : 0
            ],
            'financial' => [
                'averageSalary' => round($averageSalary, 2),
                'totalTransactions' => $totalTransactions,
                'monthlyTransactions' => $monthlyTransactions,
                'transactionGrowth' => $transactionGrowth
            ],
            'categories' => [
                'total' => $categoryStats->count(),
                'stats' => $categoryStats,
                'mostUsed' => $categoryStats->first()
            ],
            'monthlyGrowth' => $monthlyStats->pluck('count', 'month')->toArray()
        ];

        return view('dashboard.admin', compact('stats'));
    }

    private function calculateGrowthRate($current, $total)
    {
        if ($total <= 0) return 0;
        return (($current / $total) * 100) - 100;
    }
}
