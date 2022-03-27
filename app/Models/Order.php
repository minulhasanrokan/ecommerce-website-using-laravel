<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'cus_id',
        'shipping_id',
        'pay_id',
        'total',
        'status',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,'cus_id');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }

    public function payment(){
        return $this->belongsTo(Payment::class,'pay_id');
    }
}
 