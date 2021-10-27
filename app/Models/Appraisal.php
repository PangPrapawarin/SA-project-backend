<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    use HasFactory;
    protected $table = 'appraisal';

    protected $fillable = [
        'price',
        'status'
    ];

    public function invoice() {
        return $this->hasMany(Invoice::class);
    }
    public function warranty() {
        return $this->belongsTo(Warranty::class);
    }
}
