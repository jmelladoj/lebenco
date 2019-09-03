@section('title', 'LEBENCO - Editar slider')

@section('seccion', 'Editar slider')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Editar Slider {{ $slider->id }}</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('sliders/'.$slider->id.'/editar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="contenido" class="col-2 col-form-label">Contenido *</label>
                                <div class="col-3">
                                    <input type="text" id="contenido" name="contenido" class="form-control" required="" value="{{ old('contenido', $slider->contenido) }}">
                                </div>

                                <label for="color" class="col-2 col-form-label">Color de letra *</label>
                                <div class="col-3">
                                    <input type="text" id="color" name="color" class="form-control" value="{{ old('color', $slider->color) }}" /> 
                                </div>

                                <label for="color" class="col-1 col-form-label">Ubicación *</label>
                                <div class="col-3">
                                    <select name="ubicacion" id="ubicacion" class="form-control">
                                        <option value="1" {{ old('ubicacion') == 1 ? 'selected' : '' }}>INICIO</option>
                                        <option value="2" {{ old('ubicacion') == 2 ? 'selected' : '' }}>DESCANSO 1</option>
                                        <option value="3" {{ old('ubicacion') == 3 ? 'selected' : '' }}>DESCANSO 2</option>
                                        <option value="4" {{ old('ubicacion') == 4 ? 'selected' : '' }}>PÁGINA NOSOTROS</option>
                                        <option value="5" {{ old('ubicacion') == 5 ? 'selected' : '' }}>PÁGINA CONTÁCTO<option>
                                        <option value="6" {{ old('ubicacion') == 6 ? 'selected' : '' }}>PÁGINA COMUNIDAD PYME</option>
                                    </select>
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
        $('#color').colorpicker({ format: 'hex' });
    });
    </script>
@endsection


