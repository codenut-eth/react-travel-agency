<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\Budget\BudgetController;
use App\Http\Controllers\Budget\BudgetPassengerController;
use App\Http\Controllers\Budget\BudgetServiceController;
use App\Http\Controllers\Budget\BudgetTourController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\OperatorTourController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\Schedule\ScheduleController;
use App\Http\Controllers\Schedule\ScheduleReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\Tour\TourController;
use App\Http\Controllers\Tour\TourPriceController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\VehicleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Rotas públicas
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Rotas autenticadas
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/panel/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::apiResources([
        'affiliates' => AffiliateController::class,
        'budgets' => BudgetController::class,
        'budget-passengers' => BudgetPassengerController::class,
        'budget-services' => BudgetServiceController::class,
        'budget-tours' => BudgetTourController::class,
        'currencies' => CurrencyController::class,
        'customers' => CustomerController::class,
        'employees' => EmployeeController::class,
        'operators' => OperatorController::class,
        'operator-tours' => OperatorTourController::class,
        'passengers' => PassengerController::class,
        'payments' => PaymentController::class,
        'positions' => PositionController::class,
        'professionals' => ProfessionalController::class,
        'providers' => ProviderController::class,
        'schedules' => ScheduleController::class,
        'schedule-reviews' => ScheduleReviewController::class,
        'services' => ServiceController::class,
        'statuses' => StatusController::class,
        'tour-prices' => TourPriceController::class,
        'tours' => TourController::class,
        'transfers' => TransferController::class,
        'units' => UnitController::class,
        'vehicles' => VehicleController::class,
    ]);

    // Rotas Renderização
    Route::get('/panel/home/affiliates', function () {
        return Inertia::render('Home/Afiliados');
    })->name('affiliates');

    Route::get('/budgets/{budget}/complete', [BudgetController::class, 'showCompleteBudget']);
    Route::get('/budgets/{budget}/calculate-final-price', [BudgetController::class, 'calculateFinalPrice']);
});
