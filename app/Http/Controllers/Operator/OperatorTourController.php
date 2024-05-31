<?php

namespace App\Http\Controllers;

use App\Models\OperatorTour;
use Illuminate\Http\Request;

class OperatorTourController extends Controller
{
    public function index()
    {
        return OperatorTour::with('operator', 'tour')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'operator_id' => 'required|exists:operators,id',
            'tour_id' => 'required|exists:tours,id',
            'notes' => 'nullable|string',
        ]);

        return OperatorTour::create($validatedData);
    }

    public function show(OperatorTour $operatorTour)
    {
        return $operatorTour->load('operator', 'tour');
    }

    public function update(Request $request, OperatorTour $operatorTour)
    {
        $validatedData = $request->validate([
            'operator_id' => 'sometimes|required|exists:operators,id',
            'tour_id' => 'sometimes|required|exists:tours,id',
            'notes' => 'nullable|string',
        ]);

        $operatorTour->update($validatedData);

        return $operatorTour;
    }

    public function destroy(OperatorTour $operatorTour)
    {
        $operatorTour->delete();

        return response()->noContent();
    }
}
