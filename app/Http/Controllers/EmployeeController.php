<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function show(Request $request)
    {
        $employees = Employee::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $employees->where('first_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%")
                ->orWhere('cpf', $search);
        }

        return $employees->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'position_id' => 'required|exists:positions,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'cpf' => 'required|string|max:14|unique:employees',
            'gender' => 'nullable|in:Male,Female',
            'address' => 'required|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'personal_email' => 'required|email|unique:employees',
            'work_phone' => 'nullable|string|max:20',
            'personal_phone' => 'nullable|string|max:20',
            'work_email' => 'nullable|email|unique:employees',
            'bank_details' => 'nullable|string',
            'hire_date' => 'required|date',
            'termination_date' => 'nullable|date',
            'salary' => 'required|numeric',
            'photo_url' => 'nullable|url',
            'profile' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        return Employee::create($validatedData);
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'position_id' => 'required|exists:positions,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'cpf' => 'required|string|max:14|unique:employees,cpf,' . $employee->id,
            'gender' => 'nullable|in:Male,Female',
            'address' => 'required|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'personal_email' => 'required|email|unique:employees,personal_email,' . $employee->id,
            'work_phone' => 'nullable|string|max:20',
            'personal_phone' => 'nullable|string|max:20',
            'work_email' => 'nullable|email|unique:employees,work_email,' . $employee->id,
            'bank_details' => 'nullable|string',
            'hire_date' => 'required|date',
            'termination_date' => 'nullable|date',
            'salary' => 'required|numeric',
            'photo_url' => 'nullable|url',
            'profile' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $employee->update($validatedData);

        return $employee;
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->noContent();
    }
}
