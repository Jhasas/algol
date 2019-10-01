@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    <a href="/wallets" class="btn btn-success">Carteira</a>
                    <a href="/expenses" class="btn btn-primary">Despesas</a>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-6">

            <table class="table">
                <tbody>
                    <tr>
                        <td class="text-center">Receitas:</td>
                        <td class="text-center" style="color:green">{{'R$ '.number_format($totalWallets, 2, ',', '.')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">Despesas:</td>
                        <td class="text-center" style="color:red">{{'R$ '.number_format($totalExpenses, 2, ',', '.')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">Saldo:</td>
                        @if ($descontoWallet >= 0)
                            <td class="text-center" style="color:green">{{'R$ '.number_format($descontoWallet, 2, ',', '.')}}</td>
                        @else
                            <td class="text-center" style="color:red">{{'R$ '.number_format($descontoWallet, 2, ',', '.')}}</td>
                        @endif
                        
                    </tr>
                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection
