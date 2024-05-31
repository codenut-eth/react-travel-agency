<?php

namespace App\Models;

use App\Models\Operator\Operator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'name',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function operators()
    {
        return $this->hasMany(Operator::class);
    }
}
