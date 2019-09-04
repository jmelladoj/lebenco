@section('title', 'LEBENCO - Busqueda de archivos')

@section('seccion', 'Busqueda de archivos')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <h4 class="card-title">Búsqueda de archivos</h4>
                            <input type="hidden" id="palabra" name="palabra" value="{{ $palabra }}">
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaDocumentos" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>TÍTULO</th>
                                    <th>AUTOR</th>
                                    <th>PRECIO</th>
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
            var palabra = $("#palabra").val();
            var _token = $("input[name='_token']").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#tablaDocumentos').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                language: {
                "search":"Buscar",
                  "lengthMenu": "Mostar _MENU_ registros por página",
                  "zeroRecords": "Lo sentimos, no hay coincidencias. Prueba con la herramienta Documentos a pedido.",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "Registros no encontrados",
                  "infoFiltered": "(Filtrado en _MAX_ registros totales)",
                  paginate: {
                      "next" : "Siguiente",
                      "previous" : "Anterior"
                  }
                },
                ajax: {
                    url : '{{ url('busquedaPorPalabra') }}',
                    type: "POST",
                    data: {
                            "palabra": palabra
                          }
                },
                columns:[
                            { data: 'titulo', name: 'titulo' },
                            { data: 'autor', name: 'autor'},
                            { data: 'costo', name: 'valor'},
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


