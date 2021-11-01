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
        'warranties_id'
    ];

    public function invoice() {
        return $this->hasOne(Invoice::class);
    }
    public function warranty() {
        return $this->belongsTo(Warranty::class);
    }
}
