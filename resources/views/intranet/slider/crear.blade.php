@section('title', 'LEBENCO - Crear slider')

@section('seccion', 'Crear slider')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Añadir Slider</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('sliders') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="contenido" class="col-2 col-form-label">Contenido *</label>
                                <div class="col-4">
                                    <input type="text" id="contenido" name="contenido" class="form-control" required="" value="{{ old('contenido') }}">
                                </div>

                                <label for="color" class="col-2 col-form-label">Color de letra *</label>
                                <div class="col-4">
                                    <input type="text" id="color" name="color" class="form-control" value="{{ old('#ffffff','color') }}" /> 
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="color" class="col-2 col-form-label">Ubicación *</label>
                                <div class="col-4">
                                    <select name="ubicacion" id="ubicacion" class="form-control">
                                        <option value="1" {{ old('ubicacion') == 1 ? 'selected' : '' }}>INICIO</option>
                                        <option value="2" {{ old('ubicacion') == 2 ? 'selected' : '' }}>DESCANSO 1</option>
                                        <option value="3" {{ old('ubicacion') == 3 ? 'selected' : '' }}>DESCANSO 2</option>
                                        <option value="4" {{ old('ubicacion') == 4 ? 'selected' : '' }}>PÁGINA NOSOTROS</option>
                                        <option value="5" {{ old('ubicacion') == 5 ? 'selected' : '' }}>PÁGINA CONTÁCTO</option>
                                        <option value="6" {{ old('ubicacion') == 6 ? 'selected' : '' }}>PÁGINA COMUNIDAD PYME</option>
                                        <option value="7" {{ old('ubicacion') == 7 ? 'selected' : '' }}>PÁGINA SERVICIOS</option>
                                    </select>
                                </div>

                                <label for="" class="col-2 col-form-label">Link a *</label>
                                <div class="col-4">
                                    <select name="link" id="link" class="form-control">
                                        <option value="" {{ old('link') == '' ? 'selected' : '' }}>SIN LINK</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label class="col-2 control-label">Imagen *</label>
                                <div class="col-10">
                                    <input type="file" id="imagen" name="imagen" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpg png jpeg" data-min-height="600" data-min-width="1000"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/sliders') }}" type="button" class="btn btn-inverse">Cancelar</a>
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
                'default': 'Arrastra y suelta una imagen aquí o cliquea para buscar en tu equipo portátil. <br> Recomendado: 1920px de ancho por 1280px de alto.<br> Formatos permitidos: JPG, JPEG y PNG, con tamaño máximo 2MB',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Borrar',
                'error':   'Ooops, ha ocurrido un error.'
            },
            error: {
                'fileSize': 'El tamaño del archivo es demasiado grande. 2MB max).',
                'fileExtension': 'Formato no permitido, sólo JPG, PNG O JPEG.',
                'minWidth': 'El ancho de la imagen es demasiado pequeño. 1000px mínimo).',
                'minHeight': 'El alto de la imagen es demasiado pequeño. 600px mínimo).'
            }
        });

        $('#color').colorpicker({ format: 'hex' });

    });
    </script>
@endsection


