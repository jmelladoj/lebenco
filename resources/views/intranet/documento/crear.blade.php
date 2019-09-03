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
                    <form class="form" method="post" action="{{ url('documentos') }}" accept-charset="UTF-8" enctype="multipart/form-data">
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

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-2 col-form-label">Descripción documento</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="descripcion" name="descripcion" resize="" rows="5"  required>{{ old('descripcion') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="codigo" class="col-2 col-form-label">Código *</label>
                                <div class="col-4">
                                    <input type="text" id="codigo" name="codigo" class="form-control" required="" value="{{ old('codigo') }}">
                                </div>

                                <label for="codigo_interno" class="col-2 col-form-label">Código Interno *</label>
                                <div class="col-4">
                                    <input type="text" id="codigo_interno" name="codigo_interno" class="form-control" required="" value="{{ old('codigo_interno') }}" required>
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Clasificación *</label>
                                <div class="col-4">
                                    <select class="form-control custom-select" tabindex="1" id="clasificacion" name="clasificacion" required="">
                                        <option value="">Seleccionar una opción</option>
                                        <option value="1" {{ old('clasificacion') == 1 ? 'selected' : '' }} >1 ESTRELLA </option>
                                        <option value="2" {{ old('clasificacion') == 2 ? 'selected' : '' }} >2 ESTRELLAS </option>
                                        <option value="3" {{ old('clasificacion') == 3 ? 'selected' : '' }} >3 ESTRELLAS </option>
                                    </select>
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
                                    <input type="file" id="file" required name="file" class="dropify" data-allowed-file-extensions="pdf docx xlsx mp4 pptx mp3"/>
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


