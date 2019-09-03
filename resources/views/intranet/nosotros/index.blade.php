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
                            <label for="video" class="col-2 col-form-label">URL Video</label>
                            <div class="col-10">
                                <input type="text" id="video" name="video" class="form-control" required="" value="{{ old('URL Video', $page->video) }}">
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


        });
    </script>
@endsection

