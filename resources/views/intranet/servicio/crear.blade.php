@section('title', 'LEBENCO - Crear slider')

@section('seccion', 'Crear Servicios')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Añadir Servicios</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('/servicios') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label class="col-2 col-form-label">Servicio *</label>
                                <div class="col-10">
                                    <input type="text" id="titulo" name="titulo" class="form-control" required="" value="{{ old('titulo') }}">
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-2 control-label">Imagen *</label>
                                <div class="col-10">
                                    <input type="file" name="imagen" id="imagen" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpg png jpeg" data-min-height="50" data-min-width="50"/>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-2 control-label">Descripción *</label>
                                <div class="col-10">
                                    <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/servicios') }}" type="button" class="btn btn-inverse">Cancelar</a>
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
                'default': 'Arrastra y suelta un archivo aquí o haz clic. <br> Recomendado: 155px de ancho por 95px de alto <br> sólo PNG y como máximo 1MB',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Borrar',
                'error':   'Ooops, ha ocurrido un error.'
            },
            error: {
                'fileSize': 'El tamaño del archivo es demasiado grande. 1MB max).',
                'fileExtension': 'Formato no permitido, sólo PNG.',
                'minWidth': 'El ancho de la imagen es demasiado pequeño. 1000px mínimo).',
                'minHeight': 'El alto de la imagen es demasiado pequeño. 600px mínimo).'
            }
        });
    });
    </script>
@endsection

