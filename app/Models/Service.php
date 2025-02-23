<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "service_id",
        "service_name",
        "service_charge",
        "min_days_finish",
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
