<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
        'first_name',
        'last_name',
        'cpf',
        'gender',
        'address',
        'nationality',
        'personal_email',
        'work_phone',
        'personal_phone',
        'work_email',
        'bank_details',
        'hire_date',
        'termination_date',
        'salary',
        'photo_url',
        'profile',
        'notes',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

}
