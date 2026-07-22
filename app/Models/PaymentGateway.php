<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $fillable = [

        'gateway',

        'client_id',

        'secret_key',

        'publishable_key',

        'contract_code',

        'webhook_secret',

        'currency',

        'environment',

        'status',

    ];
}