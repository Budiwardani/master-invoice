<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesLetterDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [
        'id'
    ];

    public function item_data()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
