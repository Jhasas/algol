@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Criar Carteira</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('wallets.store')}}" method="POST">
                        @csrf
                        <div class="form-group col-md-7">
                            <label for="nameWallet">Nome da Carteira</label>
                            <input id="nameWallet" name="name" type="text" class="form-control">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="money2">Valor</label>
                            <input id="money2" name="value" type="text" class="money2 form-control">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="nameType">Tipo da Cardeira</label>
                            <select id="nameType" name="type_id" class="form-control">
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
        
        // function habilitar(){
        //     if (document.getElementById('gridCheck').checked) {
        //         document.getElementById('futureRelease').removeAttribute("disabled");
        //         document.getElementById('nameDescription').removeAttribute("disabled");
        //         document.getElementById('add_field').removeAttribute("disabled");
        //         // document.getElementById('futureRelease').setAttribute("placeholder", "Digite um Valor");
        //     } else {
        //         document.getElementById('futureRelease').value='';
        //         document.getElementById('futureRelease').setAttribute("disabled", "disabled");
        //         document.getElementById('nameDescription').value='';
        //         document.getElementById('nameDescription').setAttribute("disabled", "disabled");
        //         document.getElementById('add_field').setAttribute("disabled", "disabled");
        //         // document.getElementById('futureRelease').removeAttribute('placeholder')
        //     }
        // }

    </script>
    
@endsection