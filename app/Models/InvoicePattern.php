<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePattern extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'invoice_type_id'
    ];

    public function invoice_type()
    {
        return $this->hasOne(InvoiceType::class,'id','invoice_type_id');
    }
}
