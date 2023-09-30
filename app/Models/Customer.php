<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    use HasFactory;

    protected $fillable = [
        'customer_id',
        'company_name',
        'first_name',
        'last_name',
    ];

    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function paymentTerm()
    {
        return $this->hasOne(PaymentTerm::class);
    }

    public function specialField()
    {
        return $this->hasOne(SpecialField::class);
    }
}
