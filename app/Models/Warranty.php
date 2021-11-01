<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appraisal;
use App\Models\Product;

class Warranty extends Model
{
    use HasFactory;
    protected $table = 'warranties';

    protected $fillable = [
        'warranty_start_date',
        'warranty_end_date',
        'customer_name',
        'product_id'
    ];

    public function appraisal() {
        return $this->hasOne(Appraisal::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
}

