@extends('layouts.app')

@section('content')

@if (count($walletAll) > 3)
    <div class="row justify-content-center">

        <a href="#" class="btn btn-dark" style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-plus"></span> Criar nova carteira</a>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            Limites de criação de carteiras foi atingido
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
        </div>    

    </div>    
@else
    <div class="row justify-content-center"> 

        <a href="{{route('carteiras.create')}}" class="btn btn-dark" style="margin-bottom: 20px"><span class="fa fa-plus"></span> Criar nova carteira</a>
    
    </div>
@endif

@foreach ($walletAll as $wallet)
  
    <div class="row justify-content-center mt-4">
        <div class="col-md-3">
            <div class="card text-center">
        
                <div class="card-header">
                    <h5 class="card-title">{{$wallet->name}}</h5>
                </div>
                <div class="card-body">
                    <div>
                        <strong>Saldo atual: </strong> {{'R$ '.number_format($wallet->value, 2, ',', '.')}}
                    </div>
                    <div>
                        <strong>Tipo da Carteira: </strong> {{$wallet->type->name}}
                    </div>
                </div>
                <div class="card-footer">

                    <form action="{{ route('carteiras.destroy', $wallet->id) }}" method="POST">
                        <a href="{{ route('carteiras.edit', $wallet->id) }}" class="btn btn-success">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endforeach

<div class="row justify-content-center mt-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-header">
                <strong>Saldo Total: </strong> {{'R$ '.number_format($totalValue, 2, ',', '.')}}
            </div>
        </div>
    </div>
</div>


@endsection