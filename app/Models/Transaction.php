<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [

        'payment_id',

        'transaction_no',

        'gateway',

        'reference_no',

        'amount',

        'currency',

        'status',

    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}