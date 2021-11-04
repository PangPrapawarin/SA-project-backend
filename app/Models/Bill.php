<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appraisal;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';

    protected $fillable = [
        'bill_status',
        'appraisals_id'
    ];

    public function appraisal() {
        return $this->belongsTo(Appraisal::class);
    }
}
