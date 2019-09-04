@section('title', 'LEBENCO - Sugerencias')

@section('seccion', 'Sugerencia')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">         
                        @if(Auth::user()->tipo_usuario != 3)
                            <div class="col-lg-12">
                                <h4 class="card-title">Sugerencia</h4>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <h4 class="card-title">Sugerencia</h4>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{ url('sugerencias/crear') }}" class="btn btn-btn btn-success pull-right" data-toggle="tooltip" title="Añadir una sugerencia">Añadir</a>
                            </div>
                        @endif
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaUsuarios" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>ASUNTO</th>
                                    <th>ESTADO</th>
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
            $('#tablaUsuarios').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
                ajax: '{{ url('obtenerSugerencias') }}',
                columns:[
                            { data: 'id', name: 'id' },
                            { data: 'asunto', name: 'asunto' },
                            { data: 'valor_estado', name: 'valor_estado' },
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


