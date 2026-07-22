<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [

        'payment_id',
        'invoice_no',

    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}