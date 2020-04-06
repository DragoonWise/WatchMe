<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingMethod extends Model
{
    use SoftDeletes;

    public $fillable = ['type'];

    public static function create($type)
    {
        $billing_method = new BillingMethod();
        $billing_method->insert(
            ['type' => $type]
        );
        return $billing_method;
    }
}
