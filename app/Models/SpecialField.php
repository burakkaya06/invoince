<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialField extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_fields1',
        'custom_fields2'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
