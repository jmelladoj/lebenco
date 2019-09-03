@section('title', 'LEBENCO - Subcategorías')

@section('seccion', 'Subcategorías')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <h4 class="card-title">Subcategorías: {{ $category->nombre }}</h4>
                            <input type="hidden" id="categoria" name="categoria" value="{{ $category->id }}">
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ url('subcategorias/'.  $category->id  .'/crear') }}" class="btn btn-btn btn-success pull-right" data-toggle="tooltip" title="Crear una subcategoría">Añadir</a>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaSubCategorias" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID SUBCATEGORÍA</th>
                                    <th>NOMBRE</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var categoria = $("#categoria").val();
            var _token = $("input[name='_token']").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#tablaSubCategorias').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                language: {
                  "search":"Buscar",
                  "lengthMenu": "Mostar _MENU_ registros por página",
                  "zeroRecords": "Lo sentimos, no encontramos lo que estas buscando",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "Registros no encontrados",
                  "infoFiltered": "(Filtrado en _MAX_ registros totales)"
                },
                ajax: {
                    url : '{{ url('obtenerSubCategorias') }}',
                    type: "POST",
                    data: {
                            "categoria": categoria
                          }
                },
                columns:[
                            { data: 'id', name: 'id' },
                            { data: 'nombre', name: 'nombre'},
                            { data: 'acciones', name: 'acciones'}
                        ]
            });

            $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            // other options
            });

        });
    </script> 
@endsection


