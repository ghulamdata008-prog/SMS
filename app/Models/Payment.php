<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   
    protected $fillable = [

    'fee_id',
    'student_id',

    'amount',

    'payment_method',

    'payment_gateway',

    'transaction_id',

    'reference_no',

    'currency',

    'payment_status',

    'payment_date',

    'notes',

];
    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function transaction()
{
    return $this->hasOne(Transaction::class);
}
}