@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <form action="{{route('expenses.store')}}" method="POST">
            @csrf
            <div id="listas">
        
                <div class="form-row">
                    <div class="col-md-3">
                        <input id="nameDescription" name="name[]" type="text" class="form-control" placeholder="Descrição">
                    </div>
                    <div class="col-md-3">
                        <input id="money2" name="value[]" type="text" class="money2 form-control" placeholder="Valor">
                    </div>
                    <div class="col-md-3">
                        <select id="status" name="status[]" class="form-control">
                            <option value="Pago">Pago</option>
                            <option value="Pendente">Pendente</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mt-4">
                    <input class="btn btn-success" type="button" id="add_field" value="Adicionar +">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Salvar</button>
        </form>

    </div>

    <script>
    
    $(document).ready(function() {
                    var campos_max = 10;   //max de 10 campos
                    var x = 1; // campos iniciais
                    $('#add_field').click (function(e) {
                            e.preventDefault();     //prevenir novos clicks
                            if (x < campos_max) {
                                    $('#listas').append('<div>\
                                            <div class="form-row mt-4">\
                                                <div class="col-md-3">\
                                                    <input id="nameDescription" name="name[]" type="text" class="form-control" placeholder="Descrição">\
                                                </div>\
                                                <div class="col-md-3">\
                                                    <input id="value" name="value[]" type="text" class="form-control" placeholder="Valor">\
                                                </div>\
                                                <div class="col-md-3">\
                                                    <select id="status" name="status[]" class="form-control">\
                                                        <option value="Pago">Pago</option>\
                                                        <option value="Pendente">Pendente</option>\
                                                    </select>\
                                                </div>\
                                                <a href="#" type="button" class="remover_campo btn btn-danger">Remover</a>\
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