<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'model',
        'color',
        'serial_number'
    ];

    public function warranty() {
        return $this->hasMany(Warranty::class);
    }
}
