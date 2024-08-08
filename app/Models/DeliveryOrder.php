<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id','delivery_order_id');
    }

    public function detail()
    {
        return $this->hasMany(DeliveryOrderDetail::class, 'delivery_order_id','id');
    }
}
