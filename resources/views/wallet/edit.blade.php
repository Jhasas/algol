@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Criar Carteira</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('wallets.update', $wallet->id)}}" method="post">
                        
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group col-md-7">
                            <label for="nameWallet">Nome da Carteira</label>
                            <input id="nameWallet" name="name" type="text" class="form-control" value="{{$wallet->name}}">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="money2">Valor</label>
                            <input id="money2" name="value" type="text" class="money2 form-control" value="{{$wallet->value}}">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="nameType">Tipo da Cardeira</label>
                            <select id="nameType" name="type_id" class="form-control">
                                <option value="{{$wallet->type->id}}">{{$wallet->type->name}}</option>
                              @foreach ($walletType as $type)
                                 <option value="{{$type->id}}">{{$type->name}}</option>
                              @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Salvar</button>
                        
                    </form>
                </div>
            </div>

        </div>

    </div>

    <script>
        
        

    </script>
    
@endsection