@section('title', 'LEBENCO - Rifas')

@section('seccion', 'Rifas')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <h4 class="card-title">Rifas</h4>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaRifas" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID RIFA</th>
                                    <th>TÍTULO</th>
                                    <th>VALOR REGISTRO</th>
                                    <th>FECHA TERMINO</th>
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
            $('#tablaRifas').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
                ajax: '{{ url('obtenerRifasActivas') }}',
                columns:[
                            { data: 'id', name: 'id' },
                            { data: 'titulo', name: 'titulo' },
                            { data: 'valor_registro', name: 'valor_registro' },
                            { data: 'fecha_termino', name: 'fecha_termino' },
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


