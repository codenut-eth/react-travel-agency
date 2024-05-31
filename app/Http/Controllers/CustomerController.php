<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        return Customer::all();
    }

    public function show(Customer $customer) // Use route model binding
    {
        return $customer;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Male,Female',
            'document_type' => 'nullable|in:CPF,ID,Passport,Other',
            'document_number' => 'nullable|string|max:50',
            'birthdate' => 'nullable|date',
            'customer_type' => 'nullable|in:Individual,Corporate',
            'account_type' => 'nullable|in:Customer,Affiliate,Agency,Influencer',
            'notes' => 'nullable|string',
        ]);

        return Customer::create($validatedData);
    }

    public function update(Request $request, Customer $customer)
    {
        // Validação similar ao store, mas sem a regra unique para o email
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Male,Female',
            'document_type' => 'nullable|in:CPF,ID,Passport,Other',
            'document_number' => 'nullable|string|max:50',
            'birthdate' => 'nullable|date',
            'customer_type' => 'nullable|in:Individual,Corporate',
            'account_type' => 'nullable|in:Customer,Affiliate,Agency,Influencer',
            'notes' => 'nullable|string',
        ]);

        $customer->update($validatedData);

        return $customer;
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->noContent();
    }
}
