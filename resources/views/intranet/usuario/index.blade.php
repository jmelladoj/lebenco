@section('title', 'LEBENCO - Usuarios')

@section('seccion', 'Usuarios')

@extends('layouts.intranet')

@section('content')
    @if(session('status'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <h4 class="card-title">Usuarios del sistema</h4>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaUsuarios" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID USUARIO</th>
                                    <th>NOMBRE</th>
                                    <th>RUN</th>
                                    <th>EMAIL</th>
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
                ajax: '{{ url('obtenerUsuarios') }}',
                columns:[
                            { data: 'id', name: 'id' },
                            { data: 'nombre', name: 'nombre' },
                            { data: 'run', name: 'run' },
                            { data: 'email', name: 'email' },
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


