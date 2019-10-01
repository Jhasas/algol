<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
{
    
    public function index()
    {
        $expenses = Expense::all();
        $totalSpend = Expense::sum('value');
        return view('expense.index', compact('expenses', 'totalSpend'));
    }

    
    public function create()
    {
        return view('expense.create');
    }

    
    public function store(Request $request)
    { 

        for($i = 0; $i < count($request->input('name')); $i++){    
            
            $expenses = Expense::create([
                'name' => $request->name[$i],
                'value' => $request->value[$i],
                'status' => $request->status[$i]
            ]);

        }
        

        return redirect()->route('expenses.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit(Expense $expense)
    {
        return view('expense.edit', compact('expense'));
    }

    
    public function update(Request $request, Expense $expense)
    {
        $expense->fill($request->all());
        $expense->save();
        return redirect()->route('expenses.index');
    }

    
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
