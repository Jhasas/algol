<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use App\WalletType;

class WalletController extends Controller
{
    
    public function index()
    {
        $wallets = Wallet::all();
        $totalValue = $wallets->sum('value');
        
        return view('wallet.index', compact('wallets', 'totalValue'));
    }

    public function create()
    {
        return view('wallet.create', [
            'walletType' => WalletType::all()
        ]);
    }

    public function store(Request $request)
    {
        $value = str_replace('.', '', $request->input('value'));
        $value = str_replace(',', '', $value);
        Wallet::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'value' => $value
        ]);

        return redirect()->route('wallets.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Wallet $wallet)
    {
        $walletType = WalletType::all();
        return view('wallet.edit', compact('wallet', 'walletType'));
    }

    
    public function update(Request $request, Wallet $wallet)
    {
        $wallet->fill($request->all());
        $wallet->save();
        return redirect()->route('wallets.index');
    }

    
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();
        return redirect()->route('wallets.index');
    }
}
