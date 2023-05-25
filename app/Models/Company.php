<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tax_memory_id',
        'internal_series_of_tax_memory',
        'economical_number',
        'registration_number',
        'national_id',
        'post_code',
        'address',
        'phone'
    ] ;

    public function products()
    {
        return $this->hasMany(Product::class,'company_id','id');
    }
}
