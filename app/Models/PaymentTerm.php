<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'skonto_percent',
        'skonto_days',
        'payment_window',
        'vat',
        'vat_number'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


}
