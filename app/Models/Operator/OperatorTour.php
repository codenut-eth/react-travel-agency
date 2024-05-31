<?php

namespace App\Models\Operator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'operator_id',
        'tour_id',
        'notes',
    ];

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
