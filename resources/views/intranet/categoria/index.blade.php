@section('title', 'LEBENCO - Categorías')

@section('seccion', 'Categorías')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <h4 class="card-title">Categorías</h4>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ url('categorias/crear') }}" class="btn btn-btn btn-success pull-right" data-toggle="tooltip" title="Crear una profesión">Añadir</a>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaCategorias" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID CATEGORÍA</th>
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
            $('#tablaCategorias').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
                ajax: '{{ url('obtenerCategorias') }}',
                columns:[
                            { data: 'id', name: 'id' },
                            { data: 'nombre', name: 'nombre' },
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


