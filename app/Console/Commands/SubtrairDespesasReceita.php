<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Expense;
use App\Wallet;

class SubtrairDespesasReceita extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SubtrairDespesasReceita:subtrair';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vai subtrair a despesa com a receita';

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
    public function handle()
    {

        
        $expense = Expense::select('value')->wallets(); 
        dd($expense);   
        

    }
}
