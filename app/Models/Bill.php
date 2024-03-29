<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';

    protected $fillable = [
        'paid_date',
        'bill_status',
        'invoices_id'
    ];

    public function invoice() {
        return $this->hasOne(Invoice::class);
    }
}
