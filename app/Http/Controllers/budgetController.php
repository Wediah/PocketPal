<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class budgetController extends Controller
{
    public function create()
    {
        return view('budget.create');
    }
    public function store(Request $request)
    {
        $validated = request()->validate([
            'budget' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Budget::create([
            'user_id' => auth()->id(),
            'budget' => $validated['budget'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        return redirect('/home');
    }

    public function show(Request $request)
    {
        $period = $request->input('period', 'month');
        $date = $request->input('date', Carbon::now()->toDateString());

        $startDate = Carbon::parse($date)->startOf($period);
        $endDate = Carbon::parse($date)->endOf($period);

        $expenses = Expense::whereBetween('date', [$startDate, $endDate])->where('user_id', auth()->id())->sum('amount');

        $budget = Budget::where('user_id', auth()->id())
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })
            ->sum('budget');

        if ($request->ajax()) {
            return response()->json([
                'budget' => $budget,
                'expenses' => $expenses,
            ]);
        }

        return view('budget.show', compact('budget', 'expenses', 'startDate', 'endDate'));
    }
}
