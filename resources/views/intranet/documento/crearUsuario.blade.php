@section('title', 'LEBENCO - Crear una profesión')

@section('seccion', 'Crear una profesión')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Añadir documento</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('/documento/subir') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="titulo" class="col-2 col-form-label">Título *</label>
                                <div class="col-4">
                                    <input type="text" id="titulo" name="titulo" class="form-control" required="" value="{{ old('titulo') }}">
                                </div>

                                <label id="categoria" class="col-2 control-label">Categoría del Documento *</label>
                                <div class="col-4">
                                    <select class="form-control custom-select" tabindex="1" id="categoria" name="categoria" required="">
                                        <option value="">Seleccionar una opción</option>
                                        @foreach($categories as $categoria)
                                            <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Archivo *</label>
                                <div class="col-10">
                                    <input type="file" id="file" required name="file" class="dropify" data-max-file-size="30M" data-allowed-file-extensions="pdf docx xlsx mp4 pptx mp3"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/documentosAprobados') }}" type="button" class="btn btn-inverse">Cancelar</a>
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
                'default': 'Arrastra y suelta un archivo aquí o haz clic, <br> sólo PDF, WORD, EXCEL, POWER POINT, MP4, MP3 <br> y como tamaño máximo 10 MB',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Borrar',
                'error':   'Ooops, ha ocurrido un error.'
            },
            error: {
                'fileSize': 'El tamaño del archivo es demasiado grande. 10MB max).',
                'fileExtension': 'Formato no permitido, sólo PDF, WORD, EXCEL, POWER POINT, MP4, MP3.'
            }
        });

    });
    </script>
@endsection


