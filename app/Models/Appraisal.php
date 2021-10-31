<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use App\Models\Invoice;

class Appraisal extends Model
{
    use HasFactory;
    protected $table = 'appraisals';

    protected $fillable = [
        'price',
        'appraisal_status',
        'detail',
        'serial_number'
    ];

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
    public function warranty() {
        return $this->hasOne(Warranty::class);
    }
}
