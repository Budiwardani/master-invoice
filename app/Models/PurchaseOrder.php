<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function quotation()
    {
        return $this->belongsTo(SalesLetter::class, 'sales_letter_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'id','purchase_order_id');
    }

    public function detail()
    {
        return $this->hasMany(PurchaseOrderDetail::class, 'purchase_order_id','id');
    }

    public function deliveries()
    {
        return $this->hasMany(DeliveryOrder::class, 'purchase_order_id','id');
    }
}
