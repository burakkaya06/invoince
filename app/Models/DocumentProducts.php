<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentProducts extends Model
{

    protected $fillable = [
        'document_id',
        'product_id',
        'quantity',
        'price',
        'total_price',
        'description',
        'product_id_name',
        'order_id_name',
        'type'
    ];

}
