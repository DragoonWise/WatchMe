<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Subscription extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'formula', 'description', 'plan_id', 'amount'
    ];


    public static function getInfosUser()
    {
        $user = Auth::user();
        $subscription = Subscription::Join('users', 'subscriptions.id', '=', 'users.subscription_id')->where('users.id', $user->id)->select('subscriptions.*')->get();
        return $subscription;
    }
}
