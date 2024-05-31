<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'nationality',
        'email',
        'phone',
        'gender',
        'document_type',
        'document_number',
        'birthdate',
        'customer_type',
        'account_type',
        'notes',
    ];
}
