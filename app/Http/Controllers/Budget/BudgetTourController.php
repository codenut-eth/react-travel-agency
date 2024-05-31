<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use App\Models\Budget\BudgetTour;
use Illuminate\Http\Request;

class BudgetTourController extends Controller
{
    public function index()
    {
        return BudgetTour::with('budget', 'tourPrice.tour.unit.currency')->get();
    }

    public function show(BudgetTour $budgetTour)
    {
        return $budgetTour->load('budget', 'tourPrice.tour.unit.currency');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'budget_id' => 'required|exists:budgets,id',
            'tour_price_id' => 'required|exists:tour_prices,id',
            'quantity' => 'required|integer|min:1',
            'commercial_discount' => 'nullable|numeric|min:0', // Opcional, com valor padrão 0 no Model
            'down_payment' => 'nullable|numeric|min:0', // Opcional, com valor padrão 0 no Model
            'ticket_discount' => 'nullable|numeric|min:0', // Opcional, com valor padrão 0 no Model
        ]);

        return BudgetTour::create($validatedData);
    }

    public function update(Request $request, BudgetTour $budgetTour)
    {
        $validatedData = $request->validate([
            'budget_id' => 'sometimes|required|exists:budgets,id',
            'tour_price_id' => 'sometimes|required|exists:tour_prices,id',
            'quantity' => 'sometimes|required|integer|min:1',
            'commercial_discount' => 'nullable|numeric|min:0',
            'down_payment' => 'nullable|numeric|min:0',
            'ticket_discount' => 'nullable|numeric|min:0',
        ]);

        $budgetTour->update($validatedData);

        return $budgetTour;
    }

    public function destroy(BudgetTour $budgetTour)
    {
        $budgetTour->delete();

        return response()->noContent();
    }
}
