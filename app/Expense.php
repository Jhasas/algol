<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'id',
        'name',
        'value',
        'status'
    ];

    public static function boot(): void
    {
        parent::boot();
        self::creating(function (Expense $expense) {
            $expense->user_id = auth()->check() ? auth()->id() : null;
        });
    }

}
