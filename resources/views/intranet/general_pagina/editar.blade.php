@section('title', 'LEBENCO - Editar Página')

@section('seccion', 'Editar Página')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Editar Cosas Generales Página</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('/pagina/editar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label class="col-2 control-label">Logo *</label>
                                <div class="col-10">
                                    <input type="file" id="logo" name="logo" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="png" data-min-height="50" data-min-width="50"/>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-2 control-label">Favicon *</label>
                                <div class="col-10">
                                    <input type="file" id="favicon" name="favicon" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="png" data-min-height="50" data-min-width="50"/>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label class="col-2 control-label">Logo Footer *</label>
                                <div class="col-10">
                                    <input type="file" id="footer" name="footer" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="png" data-min-height="50" data-min-width="50"/>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Mensaje Comunidad Pyme primero*</label>
                                <div class="col-10">
                                    <textarea class="form-control" id="comunidad_pyme_uno" name="comunidad_pyme_uno"></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                    <label id="clasificacion" class="col-2 control-label">Mensaje Comunidad Pyme segundo*</label>
                                    <div class="col-10">
                                        <textarea class="form-control" id="comunidad_pyme_dos" name="comunidad_pyme_dos"></textarea>
                                    </div>
                                </div>
                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Mensaje Nuestros Servicios *</label>
                                <div class="col-10">
                                    <textarea class="form-control" id="servicios" name="servicios"></textarea>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Terminos y condiciones *</label>
                                <div class="col-10">
                                    <input type="file" id="logo" name="logo" class="dropify" data-allowed-file-extensions="pdf" data-min-height="50" data-min-width="50"/>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Políticas de privacidad *</label>
                                <div class="col-10">
                                    <input type="file" id="logo" name="logo" class="dropify" data-allowed-file-extensions="pdf" data-min-height="50" data-min-width="50"/>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Políticas de satisfacción *</label>
                                <div class="col-10">
                                    <input type="file" id="logo" name="logo" class="dropify" data-allowed-file-extensions="pdf" data-min-height="50" data-min-width="50"/>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Políticas de derecho de autor *</label>
                                <div class="col-10">
                                    <input type="file" id="logo" name="logo" class="dropify" data-allowed-file-extensions="pdf" data-min-height="50" data-min-width="50"/>
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

