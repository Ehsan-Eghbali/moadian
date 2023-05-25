<?php

namespace App\Models;

use App\Models\Traits\InvoiceFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory,SoftDeletes,InvoiceFilterTrait;

    protected $guarded = [];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function state(): HasOne
    {
        return $this->hasOne(State::class,'id','state_id');
    }
}
