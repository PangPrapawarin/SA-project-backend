<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';

    protected $fillable = [
        'paid_date',
        'time_total',
        'bill_status'
    ];

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
