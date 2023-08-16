<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index() {

        $transactions = Transaction::limit(3)->get();

        $months = array();
        $total_paid_amounts = array();
        foreach ($transactions as $key => $transaction)
        {
            $paid_amount =  $transaction->total_paid;
            $month_name =  date("F",mktime( null,null,null,substr( $transaction->created_at,5,2 ),1 ) );
            array_push( $months,$month_name );
            array_push( $total_paid_amounts,$paid_amount);
        }
        
        return view('dashboard.loan.loan', compact('transactions', 'months', 'total_paid_amounts'));
    }
}
