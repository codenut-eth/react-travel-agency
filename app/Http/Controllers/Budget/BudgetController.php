<?php

namespace App\Http\Controllers\Budget;


use App\Http\Controllers\Controller;
use App\Models\Budget\Budget;
use App\Models\Budget\BudgetTour;
use App\Models\Tour\TourPrice;
use Illuminate\Http\Request;
//use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;

class BudgetController extends Controller
{
    public function index()
    {
        return Budget::with('customer', 'employee', 'affiliate', 'status')->get();
    }

    public function show(Budget $budget)
    {
        return $budget;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'employee_id' => 'required|exists:employees,id',
            'affiliate_id' => 'nullable|exists:affiliates,id',
            'status_id' => 'required|exists:budget_statuses,id',
            'name' => 'required|string',
            'number_of_people' => 'required|integer',
            'support_phone' => 'nullable|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'validity' => 'required|date',
            'payment_method' => 'required|in:Transfer,Card,Other',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'notes' => 'nullable|string',
        ]);

        return Budget::create($validatedData);
    }

    public function update(Request $request, Budget $budget)
    {
        // Validação similar ao store, mas sem a regra unique para o email
        $validatedData = $request->validate([
            'customer_id' => 'sometimes|required|exists:customers,id',
            'employee_id' => 'sometimes|required|exists:employees,id',
            'affiliate_id' => 'nullable|exists:affiliates,id',
            'status_id' => 'sometimes|required|exists:budget_statuses,id',
            'name' => 'sometimes|required|string',
            'number_of_people' => 'sometimes|required|integer',
            'support_phone' => 'nullable|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'validity' => 'sometimes|required|date',
            'payment_method' => 'sometimes|required|in:Transfer,Card,Other',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date',
            'notes' => 'nullable|string',
        ]);

        $budget->update($validatedData);

        return $budget;
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();

        return response()->noContent();
    }

    public function getExchangeRate($fromCurrency, $toCurrency)
    {
        $exchangeRates = new ExchangeRate();

        try {
            return $exchangeRates->exchangeRate($fromCurrency, $toCurrency);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function showCompleteBudget(Request $request, Budget $budget)
    {
        $defaultCurrency = 'CLP';
        $downPayment = (float)$request->input('down_payment');

        $budgetTours = $budget->tours; // Use o relacionamento para obter os passeios

        $totalReservationCost = 0;
        $totalSellingPrice = 0;
        $totalRemainingAmount = 0;
        $auxiliaryValues = "";

        $valuesByCurrency = [];

        foreach ($budgetTours as $budgetTour) {
            $currentCurrency = $budgetTour->tourPrice->currency->symbol; // Obtém o símbolo da moeda do passeio

            // Initialize individual values for this currency
            $reservationCost = $budgetTour->tourPrice->cost_price * $budgetTour->quantity;
            $sellingPrice = $budgetTour->tourPrice->list_price * $budgetTour->quantity;
            $remainingAmount = $sellingPrice - $reservationCost;

            if ($currentCurrency != $defaultCurrency) {
                if (!isset($valuesByCurrency[$currentCurrency])) {
                    $valuesByCurrency[$currentCurrency] = [
                        'reservationCost' => 0,
                        'sellingPrice' => 0,
                        'remainingAmount' => 0
                    ];
                }

                $valuesByCurrency[$currentCurrency]['reservationCost'] += $reservationCost;
                $valuesByCurrency[$currentCurrency]['sellingPrice'] += $sellingPrice;
                $valuesByCurrency[$currentCurrency]['remainingAmount'] += $remainingAmount;
            }

            $totalReservationCost += $reservationCost;
            $totalSellingPrice += $sellingPrice;
            $totalRemainingAmount += $remainingAmount;
        }

        foreach ($valuesByCurrency as $currency => $values) {
            $auxiliaryValues .=
                "   Reservation cost in $currency: {$values['reservationCost']}" .
                "   Selling price in $currency: {$values['sellingPrice']}" .
                "   Remaining amount in $currency: {$values['remainingAmount']}";
        }

        $budget->auxiliary_values = $auxiliaryValues;

        if ($downPayment > $totalRemainingAmount) {
            return response()->json("Error, the down payment amount is greater than the remaining amount, the remaining amount is: $totalRemainingAmount", 401);
        }

        $totalRemainingAmount -= $downPayment;

        $budget->total_reservation_cost = $totalReservationCost;
        $budget->total_selling_price = $totalSellingPrice;
        $budget->total_remaining_amount = $totalRemainingAmount;
        $budget->down_payment = $downPayment;

        $budget->save();

        return $budget;
    }

    public function calculateFinalPrice($budgetId)
    {
        $budget = Budget::findOrFail($budgetId);

        $finalPrice = 0;
        foreach ($budget->tours as $budgetTour) {
            $tourPrice = $budgetTour->tourPrice;
            $finalPrice += $tourPrice->list_price * $budgetTour->quantity;
        }

        return response()->json(['final_price' => $finalPrice]);
    }
}
