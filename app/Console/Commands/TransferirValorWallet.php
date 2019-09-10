<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use App\Wallet;
use App\FixedValue;

class TransferirValorWallet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TransferirValorWallet:transferencia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vai transferir um valor da tabela future_release para tabela value';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Wallet $wallet, FixedValue $fixedValue)
    {

        // for ($i = 0; $i < count($wallet->id)); $i++) {
        // }
        
        // $teste = $fixedValue->pluck('f_value', 'id');
        // dd($teste);

        $valor_wallet = $wallet->all()->fixed->sum('f_value');
        dd($valor_wallet);
        $wallet->value = $wallet->value + $valor_wallet;
        // dd($wallet->value);
        $wallet->save();
        // dd($valor_wallet);
        
            // $fixedValue->where('wallet_id', $wallet->id)->get();
            
            //     dd($fixedValue);
            


        

        // $sum = DB::table('wallets')->sum(DB::raw('value + future_release'));
        // DB::table('wallets')->update(['value'=>$sum]);
    }
}
