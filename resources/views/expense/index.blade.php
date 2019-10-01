@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <a href="{{route('expenses.create')}}" class="btn btn-dark">Adicionar nova despesa</a>
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-6">

            <table class="table">

                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Valor</th>
                        <th class="text-center">Situação</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                        
                        <tr>
                            <td class="text-center">{{$expense->id}}</td>
                            <td class="text-center">{{$expense->name}}</td>
                            <td class="text-center">{{'R$ '.number_format($expense->value, 2, ',', '.')}}</td>
                            <td class="text-center">{{$expense->status}}</td>
                            <td class="text-center">

                                <form action="{{route('expenses.destroy', $expense->id)}}" method="POST">
                                    <a href="{{route('expenses.edit', $expense->id)}}" class="btn btn-sm btn-success">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                </form>

                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

    <div class="row justify-content-center mt-5">

        <div class="col-md-2">

                <table class="table">

                        <thead>
                            <tr>
                                <th class="text-center">Total Despesas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{'R$ '.number_format($totalSpend, 2, ',', '.')}}</td>
                            </tr>
                        </tbody>
        
                    </table>

        </div>

    </div>

@endsection