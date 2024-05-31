<?php

namespace App\Models\Budget;

use App\Models\Tour\TourPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget_id',
        'tour_price_id',
        'quantity',
        'commercial_discount',
        'down_payment',
        'ticket_discount',
    ];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function tourPrice()
    {
        return $this->belongsTo(TourPrice::class);
    }
}
