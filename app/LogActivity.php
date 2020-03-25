<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log_activies';
    protected $fillable = [
        'ip', 'user_id'
    ];
}
