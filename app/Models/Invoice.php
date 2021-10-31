<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use App\Models\Appraisal;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';

    protected $fillable = [
        'date_of_repair',
        'start_fix',
        'end_fix',
        'invoice_status',
        'employee_id',
        'appraisals_id'
    ];

    // public function bill() {
    //     return $this->hasOne(Bill::class);
    // }
    public function appraisal() {
        return $this->belongsTo(Appraisal::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
