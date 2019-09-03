@section('title', 'LEBENCO - Crear Rifa')

@section('seccion', 'Crear Rifa')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Añadir Rifa</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('rifas') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="titulo" class="col-2 col-form-label">Título *</label>
                                <div class="col-4">
                                    <input type="text" id="titulo" name="titulo" class="form-control" required="" value="{{ old('titulo') }}">
                                </div>

                                <label for="valor" class="col-2 col-form-label">Valor *</label>
                                <div class="col-4">
                                    <input type="number" id="valor" name="valor" class="form-control" required="" min="0" value="{{ old('valor') }}">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="premio" class="col-2 col-form-label">Premio *</label>
                                <div class="col-4">
                                    <input type="text" id="premio" name="premio" class="form-control" required="" value="{{ old('premio') }}">
                                </div>

                                <label for="fecha_termino" class="col-2 col-form-label">Fecha termino*</label>
                                <div class="col-4">
                                    <input type="date" id="fecha_termino" name="fecha_termino" class="form-control" required="" value="{{ old('fecha_termino') }}">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Imagen *</label>
                                <div class="col-10">
                                    <input type="file" id="file" required name="file" class="dropify" data-allowed-file-extensions="jpg png jpeg"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/rifas') }}" type="button" class="btn btn-inverse">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('script')
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo aquí o haz clic. <br> Recomendado: 1920px de ancho por 1280px de alto <br> sólo JPG, PNG O JPEG y como máximo 2MB',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Borrar',
                'error':   'Ooops, ha ocurrido un error.'
            },
            error: {
                'fileSize': 'El tamaño del archivo es demasiado grande. 2MB max).',
                'fileExtension': 'Formato no permitido, sólo JPG, PNG O JPEG.'
            }
        });

    });
    </script>
@endsection


