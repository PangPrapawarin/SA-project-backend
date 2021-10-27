<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;
    protected $table = 'warranty';

    protected $fillable = [
        'warranty_start_date',
        'warranty_end_date',
        'customer_name'
    ];

    public function appraisal() {
        return $this->hasMany(Appraisal::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
}

