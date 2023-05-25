<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'code',
        'invoice_start',
        'invoice_end',
        'invoice_pattern_id',
        'company_id'
    ];

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class,'id','invoice_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
}
