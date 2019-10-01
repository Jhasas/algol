@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

            <form action="{{route('expenses.update', $expense->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="nameDescription">Descrição</label>
                                <input id="nameDescription" name="name" type="text" class="form-control" value="{{$expense->name}}">
                            </div>
                            <div class="col-md-4">
                                <label for="money2">Valor</label>
                                <input id="money2" name="value" type="text" class="money2 form-control" value="{{$expense->value}}">
                            </div>
                            <div class="col-md-4">
                                <label for="value">Carteira</label>
                                <select id="nameType" name="wallet_id[]" class="form-control">
                                    <option value="{{$expense->wallets->id}}">{{$expense->wallets->name}}</option>
                                    @foreach ($wallets as $wallet)
                                        <option value="{{$wallet->id}}">{{$wallet->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary mt-4 col-md-12">Salvar</button>
                </form>

    </div>

@endsection