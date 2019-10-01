<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'id',
        'name',
        'type_id',
        'value'
    ];

    public static function boot(): void
    {
        parent::boot();
        self::creating(function (Wallet $wallet) {
            $wallet->user_id = auth()->check() ? auth()->id() : null;
        });
    }

    public function type() 
    {
        return $this->belongsTo('App\WalletType', 'type_id', 'id');
    }
    
}
