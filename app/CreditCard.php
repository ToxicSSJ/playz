<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable = [
        'id', 'number', 'expirationMonth', 'expirationYear', 'name', 'cvc'
    ];
}
