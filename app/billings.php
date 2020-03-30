<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    use SoftDeletes;

    public $fillable = ['paiement_type', 'ticket_number', 'currency_code', 'payment_status'];
}
