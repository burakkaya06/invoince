<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'additional_line',
        'street_adress',
        'zip_code',
        'city',
        'state',
        'country',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
