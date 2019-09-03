@section('title', 'LEBENCO - Tarifas')

@section('seccion', 'Tarifas')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <h4 class="card-title">Tarifas</h4>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ url('tarifas/crear') }}" class="btn btn-btn btn-success pull-right" data-toggle="tooltip" title="Crear una tarifa">Añadir</a>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaTarifas" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>MONTO</th>
                                    <th>BONIFICACIÓN</th>
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
            $('#tablaTarifas').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
                ajax: '{{ url('obtenerTarifas') }}',
                columns:[
                            { data: 'id', name: 'id' },
                            { data: 'monto', name: 'monto' },
                            { data: 'bonificacion', name: 'bonificacion' },
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


