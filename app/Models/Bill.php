<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function billdetail()
    {
        return $this->hasMany(BillDetail::class, 'bill_id');
    }
}
