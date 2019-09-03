@section('title', 'LEBENCO - Editar Promoción')

@section('seccion', 'Editar Promoción')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Editar Promoción</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('/promociones/'. $promocion->id .'/editar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="titulo" class="col-2 col-form-label">Título *</label>
                                <div class="col-4">
                                    <input type="text" id="titulo" name="titulo" class="form-control" required="" value="{{ old('titulo', $promocion->titulo) }}">
                                </div>

                                <label for="valor" class="col-2 col-form-label">Categoría de usuario *</label>
                                <div class="col-4">
                                    <select class="form-control custom-select" data-placeholder="Seleccione una opción ..." tabindex="1" id="categoria" name="categoria" required="">
                                        <option value="">Seleccionar una opción</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" {{ old('categoria', $promocion->user_category_id) == $categoria->id ? 'selected' : '' }}>{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group m-t-40 row">
                                <label id="clasificacion" class="col-2 control-label">Imagen *</label>
                                <div class="col-10">
                                    <input type="file" id="file" name="file" class="dropify" data-allowed-file-extensions="jpg png jpeg"/>
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
                'default': 'Arrastra y suelta un archivo aquí o haz clic',
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


