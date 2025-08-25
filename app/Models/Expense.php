<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'description',
        'amount',
        'category',
        "user_id",
    ];


    protected static function booted()
    {
        static::creating(function (Expense $expense) {
            if (auth()->check() && is_null($expense->user_id)) {
                $expense->user_id = auth()->id();
            }
        });
    }
}
