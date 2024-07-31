<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesLetter extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function detail()
    {
        return $this->hasMany(SalesLetterDetail::class, 'sales_leter_id','id');
    }
}
