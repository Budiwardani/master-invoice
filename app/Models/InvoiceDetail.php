<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function item_data()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
