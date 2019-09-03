@section('title', 'LEBENCO - Crear Categoría de Usuario')

@section('seccion', 'Crear Categoría de Usuario')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Crear Categoría de Usuario</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('categoriasUsuario') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Nombre *</label>
                                <div class="col-4">
                                    <input type="text" id="nombre" name="nombre" class="form-control" required="" value="{{ old('nombre') }}">
                                </div>

                                <label for="dias" class="col-2 col-form-label">Días de conexión *</label>
                                <div class="col-4">
                                    <input type="number" id="dias" name="dias" class="form-control" required="" min="0" value="{{ old('dias') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/categoriasUsuario') }}" type="button" class="btn btn-inverse">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

