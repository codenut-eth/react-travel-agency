<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        return Currency::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'symbol' => 'required|string|unique:currencies',
            'name' => 'required|string',
        ]);

        $currency = Currency::create($validatedData);

        return response()->json(['message' => 'Currency created successfully!', 'data' => $currency], 201);
    }

    public function show(Currency $currency)
    {
        return $currency;
    }

    public function update(Request $request, Currency $currency)
    {
        $validatedData = $request->validate([
            'symbol' => 'sometimes|required|string|unique:currencies,symbol,' . $currency->id,
            'name' => 'sometimes|required|string',
        ]);

        $currency->update($validatedData);

        return response()->json(['message' => 'Currency updated successfully!', 'data' => $currency], 200);
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();

        return response()->json(['message' => 'Currency deleted successfully!'], 200);
    }
}
