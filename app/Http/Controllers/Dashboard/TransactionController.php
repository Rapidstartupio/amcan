<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index() {
        if (Auth::user() == null)
        {
            return redirect()->route('login');
        }
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.transaction.index', compact('transactions'));
    }

    public function view($id) {
        if (Auth::user() == null)
        {
            return redirect()->route('login');
        }
        $transaction = Transaction::where('id', '=', $id)->first();
        return view('dashboard.transaction.view', compact('transaction'));
    }
}
