<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{

    protected $fillable = [
        'order_id_name',
        'order_id',
        'customer_id',
        'type',
        'status',
    ];

}
