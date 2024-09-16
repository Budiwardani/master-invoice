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

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function deliveryOrder()
    {
        return $this->hasMany(DeliveryOrder::class, 'invoice_id','id');
    }

    public function detail()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id','id');
    }
}
