<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use App\WalletType;
use App\FixedValue;

class WalletController extends Controller
{

    function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }
    
    public function index()
    {
        $walletAll = $this->wallet->get();
        $totalValue = $this->wallet->sum('value');
        
        return view('wallet.index', compact('walletAll', 'totalValue'));
    }

    public function create(WalletType $type)
    {
        $walletType = $type->all();
        return view('wallet.create', compact('walletType'));
    }

    public function store(Request $request)
    {
        $fixedV = new FixedValue();

        $filler = $request->all();
        $allWallet = $this->wallet->create($filler);

        if (!empty($request->input('description')) && !empty($request->input('f_value'))) {

            for ($i = 0; $i < count($request->input('f_value')); $i++) {

                $fixedV->create([
                    'wallet_id' => $allWallet->id,
                    'description' => $request->description[$i],
                    'f_value' => $request->f_value[$i]
                ]);

            }

        }
        return redirect()->route('carteiras.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id, WalletType $type)
    {
       $walletAll = $this->wallet->find($id);
       $walletType = $type->all();

       return view('wallet.edit', compact('walletAll', 'walletType'));
    }

    
    public function update(Request $request, $id)
    {
        $formAll = $request->all();
        $walletInfo = $this->wallet->find($id);
        $walletInfo->update($formAll);
        return redirect()->route('carteiras.index');
    }

    
    public function destroy($id)
    {
        $walletDel = $this->wallet->find($id);
        if (isset($walletDel)) {
            $walletDel->delete();
        }
        return redirect()->route('carteiras.index');
    }
}
