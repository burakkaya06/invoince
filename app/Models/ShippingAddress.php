<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        's_company_name',
        's_first_name',
        's_last_name',
        's_additional_line',
        's_street_adress',
        's_zip_code',
        's_city',
        's_state',
        's_country'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
