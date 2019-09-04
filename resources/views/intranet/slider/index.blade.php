@section('title', 'LEBENCO - Web')

@section('seccion', 'Sliders')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <h4 class="card-title">Sliders</h4>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ url('sliders/crear') }}" class="btn btn-btn btn-success pull-right" data-toggle="tooltip" title="Crear Slider">Crear</a>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaSliders" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID SLIDER</th>
                                    <th>CONTENIDO</th>
                                    <th>COLOR</th>
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
            $('#tablaSliders').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
                ajax: '{{ url('obtenerSliders') }}',
                columns:[
                            { data: 'id', name: 'id' },
                            { data: 'contenido', name: 'contenido' },
                            { data: 'color_slider', name: 'color'},
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


