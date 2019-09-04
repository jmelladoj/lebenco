@section('title', 'LEBENCO - Página Nosotros')

@section('seccion', 'Página Nosotros')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <form class="form" method="post" action="{{ url('/nosotros') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="html" name="html">{{ old('html', $page->contenido) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-2 control-label">Video *</label>
                            <div class="col-10">
                                <input type="file" name="video" id="video" class="dropify"  data-allowed-file-extensions="mp4"/>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('textarea').ckeditor();
            CKEDITOR.config.height = '500px';

            CKEDITOR.config.extraPlugins = 'justify';

            $('.dropify').dropify({
                messages: {
                    'default': 'Arrastra y suelta un archivo aquí o haz clic. Sólo vídeos.',
                    'replace': 'Arrastra y suelta o haz clic para reemplazar',
                    'remove':  'Borrar',
                    'error':   'Ooops, ha ocurrido un error.'
                },
                error: {
                    'fileSize': 'El tamaño del archivo es demasiado grande. 100MB max).',
                    'fileExtension': 'Formato no permitido, sólo Vídeo.'
                }
            });

        });
    </script>
@endsection


