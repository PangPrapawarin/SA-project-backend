<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'warranty';

    protected $fillable = [
        'date_of_repair',
        'start_fix',
        'end_fix',
        'invoice_status'
    ];

    public function bill() {
        return $this->hasMany(Bill::class);
    }
    public function appraisal() {
        return $this->belongsTo(Appraisal::class);
    }
}
