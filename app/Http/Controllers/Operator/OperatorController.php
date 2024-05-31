<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        return Operator::with('currency')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'name' => 'required|string|max:255',
            'business_phone' => 'nullable|string|max:20',
            'support_phone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:operators',
            'website' => 'nullable|url',
            'bank_details' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'document_type' => 'nullable|in:CPF,ID,Passport,Other',
            'document_number' => 'nullable|string|max:50',
            'responsible_person' => 'nullable|string|max:255',
            'main_activity' => 'nullable|string|max:255',
            'destination' => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        return Operator::create($validatedData);
    }

    public function show(Operator $operator)
    {
        return $operator->load('currency');
    }

    public function update(Request $request, Operator $operator)
    {
        $validatedData = $request->validate([
            'currency_id' => 'sometimes|required|exists:currencies,id',
            'name' => 'sometimes|required|string|max:255',
            'business_phone' => 'nullable|string|max:20',
            'support_phone' => 'nullable|string|max:20',
            'email' => 'sometimes|required|email|unique:operators,email,' . $operator->id,
            'website' => 'nullable|url',
            'bank_details' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'document_type' => 'nullable|in:CPF,ID,Passport,Other',
            'document_number' => 'nullable|string|max:50',
            'responsible_person' => 'nullable|string|max:255',
            'main_activity' => 'nullable|string|max:255',
            'destination' => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $operator->update($validatedData);

        return $operator;
    }

    public function destroy(Operator $operator)
    {
        $operator->delete();

        return response()->noContent();
    }
}
