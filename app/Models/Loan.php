<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loan_amount',
        'repayment_amount',
        'repayment_frequency',
        'start_date',
        'expected_end_date',
        'status'
    ];
}
