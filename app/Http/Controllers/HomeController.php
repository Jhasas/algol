<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use App\Expense;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wallets = Wallet::all();
        $totalWallets = $wallets->sum('value');
        $expenses = Expense::all();
        $totalExpenses = $expenses->sum('value');
        $descontoWallet = $totalWallets - $totalExpenses;

        return view('home', compact('wallets', 'totalWallets', 'expenses', 'totalExpenses', 'descontoWallet'));
    }
}
