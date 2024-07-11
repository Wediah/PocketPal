<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class homeController extends Controller
{
    public function privacy(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('privacy');
    }

    public function help(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('help');
    }

    public function home(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $expenses = $user->expenses()
            ->latest()
            ->take(5)
            ->get();

        $budget = $user->budgets;

        $startDate = Carbon::parse($request->input('start_date', now()));
        $endDate = Carbon::parse($request->input('end_date', now()));

        $totalBudget = Budget::where('user_id', $user->id)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })
            ->sum('budget');

        $totalExpenses = Expense::where('user_id', $user->id)
                        ->whereBetween('date', [$startDate, $endDate])
                        ->sum('amount');

        $percentage = $totalBudget > 0 ? ($totalExpenses / $totalBudget) * 100 : 0;

        $balance = $totalBudget - $totalExpenses;

        return view('home.index', compact('user', 'expenses', 'budget', 'startDate', 'endDate', 'totalBudget', 'totalExpenses',
            'percentage', 'balance'));
    }

    public function transactions(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();

        $categories = Category::all();

        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        $expenses = Expense::where('user_id', $user->id)
            ->whereMonth('date', $month)
            ->whereYear('date',$year)
            ->get();


        return view('transactions.index', compact('user', 'month', 'expenses', 'year', 'categories'));
    }

    public function withCategory($slug): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::where('slug', $slug)->with('expenses')->firstOrFail();
        $expenses = $categories->expenses()->paginate(5);

        return view('transactions.category', compact('categories', 'expenses'));
    }

    public function report(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $startDate = $request->input('start_date', now()->toDateString());
        $endDate = $request->input('end_date', now()->toDateString());


        $expenses = Expense::whereBetween('created_at', [$startDate, $endDate])
            ->select('category_id', DB::raw('SUM(amount) as total_amount'))
            ->groupBy('category_id')
            ->with('category')
            ->orderBy('total_amount', 'desc')
            ->get();

        $totalExpenses = $expenses->sum('total_amount');

        $categories = Category::all();

        return view('report.index', compact('categories', 'expenses', 'startDate', 'endDate', 'totalExpenses'));

//        return view('report.index');
    }
}
