<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedValue extends Model
{
    public $timestamps = false;
    protected $fillable = ['wallet_id', 'description', 'f_value'];

    public function fixed2() 
    {
        return $this->belongsTo('App\Wallet');
    }
}
