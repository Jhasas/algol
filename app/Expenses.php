<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'id',
        'name',
        'value'
    ];

    public static function boot(): vaid
    {
        parent::boot();
        self::creating(function (Expenses $expenses) {
            $expenses->user_id = auth()->check() ? auth()->id() : null;
        });
    }
}
