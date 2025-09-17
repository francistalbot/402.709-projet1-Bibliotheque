<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripePayments extends Model
{
    protected $fillable = [
        'payment_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status',
    ];
}
