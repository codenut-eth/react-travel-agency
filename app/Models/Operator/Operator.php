<?php

namespace App\Models\Operator;

use App\Models\Tour\Tour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_id',
        'name',
        'business_phone',
        'support_phone',
        'email',
        'website',
        'bank_details',
        'address',
        'description',
        'document_type',
        'document_number',
        'responsible_person',
        'main_activity',
        'destination',
        'certification',
        'notes',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'operator_tours');
    }
}
