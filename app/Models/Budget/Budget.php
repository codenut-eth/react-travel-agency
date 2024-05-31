<?php

namespace App\Models\Budget;

use App\Models\Budget\BudgetTour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'employee_id',
        'affiliate_id',
        'status_id',
        'name',
        'number_of_people',
        'support_phone',
        'emergency_contact',
        'validity',
        'payment_method',
        'start_date',
        'end_date',
        'notes',
        // Campos calculados que não são armazenados no banco de dados
        'total_reservation_cost',
        'total_selling_price',
        'total_remaining_amount',
        'down_payment',
        'auxiliary_values',
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tours()
    {
        return $this->hasMany(BudgetTour::class);
    }

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class, 'budget_passengers');
    }
}
