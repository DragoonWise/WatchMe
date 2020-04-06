<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

class PayPalController extends Controller
{
    public function payment()

    {

        // paiement options
        $data = [];
        $data['items'] = [
            [
                'name' => 'Formule 1 mois',
                'price' => 10,
                'qty'   => 1,
            ],
            [
                'name' => 'Formule 3 mois',
                'price' => 27,
                'qty' => 1
            ],
            [
                'name' => 'Formule 6 mois',
                'price' => 46,
                'qty' => 1
            ]
        ];

        $data['subscription_desc'] = "Monthly Subscription #1";
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Monthly Subscription #1";
        $data['return_url'] = url('/paypal/ec-checkout-success?mode=recurring');
        $data['cancel_url'] = url('/');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $data['total'] = $total;

        // paypal redirection
        $provider = new ExpressCheckout;
        $response = $provider->setCurrency('EUR')->setExpressCheckout($data, true);
        return redirect($response['paypal_link']);
    }
}
