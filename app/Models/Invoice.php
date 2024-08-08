<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function quotation()
    {
        return $this->belongsTo(SalesLetter::class, 'sales_leter_id');
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }

    public function deliveryOrder()
    {
        return $this->belongsTo(DeliveryOrder::class, 'delivery_order_id');
    }

    public function detail()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id','id');
    }
}
