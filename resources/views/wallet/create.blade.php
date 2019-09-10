@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Criar Carteira</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('carteiras.store')}}" method="POST">
                        @csrf
                        <div class="form-group col-md-7">
                            <label for="nameWallet">Nome da Carteira</label>
                            <input id="nameWallet" name="name" type="text" class="form-control">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="nameValue">Valor</label>
                            <input id="nameValue" name="value" type="text" class="form-control">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="nameType">Tipo da Cardeira</label>
                            <select id="nameType" name="type_id" class="form-control">
                              @foreach ($walletType as $type)
                                 <option value="{{$type->id}}">{{$type->name}}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-7">
                            <input class="form-check-input" type="checkbox" id="gridCheck" onchange="habilitar()">
                            <label for="gridCheck" class="form-check-label">Depositar um valor todo mês? (opcional)</label>
                        </div>

                        <div id="listas">

                            <div class="form-group col-md-7">
                                <label for="nameDescription">Descrição</label>
                                <input id="nameDescription" name="description[]" type="text" class="form-control" disabled>
                            
                                <label for="futureRelease" class="mt-2">Valor</label>
                                <input id="futureRelease" name="f_value[]" type="text" class="form-control" disabled>
                            </div>

                        </div>
                        <div class="form-group col-md-7">
                            <input class="btn btn-success" type="button" id="add_field" value="+" disabled>
                        </div>

                        <button type="submit" class="btn btn-success">Salvar</button>
                        
                    </form>
                </div>
            </div>

        </div>

    </div>

    <script>
        
        function habilitar(){
            if (document.getElementById('gridCheck').checked) {
                document.getElementById('futureRelease').removeAttribute("disabled");
                document.getElementById('nameDescription').removeAttribute("disabled");
                document.getElementById('add_field').removeAttribute("disabled");
                // document.getElementById('futureRelease').setAttribute("placeholder", "Digite um Valor");
            } else {
                document.getElementById('futureRelease').value='';
                document.getElementById('futureRelease').setAttribute("disabled", "disabled");
                document.getElementById('nameDescription').value='';
                document.getElementById('nameDescription').setAttribute("disabled", "disabled");
                document.getElementById('add_field').setAttribute("disabled", "disabled");
                // document.getElementById('futureRelease').removeAttribute('placeholder')
            }
        }

            $(document).ready(function() {
                    var campos_max = 4;   //max de 10 campos
                    var x = 1; // campos iniciais
                    $('#add_field').click (function(e) {
                            e.preventDefault();     //prevenir novos clicks
                            if (x < campos_max) {
                                    $('#listas').append('<div>\
                                            <div class="form-group col-md-7">\
                                            <label for="nameDescription">Descrição</label>\
                                            <input id="nameDescription" name="description[]" type="text" class="form-control">\
                                            <label for="futureRelease" class="mt-2">Valor</label>\
                                            <input id="futureRelease" name="f_value[]" type="text" class="form-control">\
                                            <a href="#" class="remover_campo">Remover</a>\
                                            </div>\
                                            </div>');
                                    x++;
                            }
                    });
            
                    // Remover o div anterior
                    $('#listas').on("click",".remover_campo",function(e) {
                            e.preventDefault();
                            $(this).parent('div').remove();
                            x--;
                    });
            });

    </script>
    
@endsection