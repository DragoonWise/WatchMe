<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    use SoftDeletes;

    public $fillable = ['paiement_type', 'ticket_number', 'currency_code', 'payment_status', 'users_id', 'billing_methods_id'];

    public static function create($paiement_type, $users_id, $billing_methods_id, $ticket_number = Null, $currency_code = Null, $payment_status = Null)
    {
        $billing = new Billing();
        $billing->paiement_type = $paiement_type;
        $billing->ticket_number = $ticket_number;
        $billing->currency_code = $currency_code;
        $billing->payment_status = $payment_status;
        $billing->users_id= $users_id;
        $billing->billing_methods_id = $billing_methods_id;
        $billing->save();
        return $billing;
    }
}
