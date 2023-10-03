<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    use HasFactory;

    protected $fillable = [
        'customer_id_name',
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

    public function invoiceAddress()
    {
        return $this->hasOne(InvoiceAddress::class);
    }



    protected static function booted()
    {
        static::deleting(function ($customer) {
            $customer->shippingAddress()->delete();
            $customer->paymentTerm()->delete();
            $customer->specialField()->delete();
            $customer->invoiceAddress()->delete();
        });
    }
}
