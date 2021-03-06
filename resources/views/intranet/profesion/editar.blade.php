@section('title', 'LEBENCO - Crear una profesión')

@section('seccion', 'Editar una profesión')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Editar una profesión</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('profesiones/'.$profession->id.'/editar') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Nombre *</label>
                                <div class="col-10">
                                    <input type="text" id="nombre" name="nombre" class="form-control" required="" value="{{ old('nombre', $profession->nombre) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/profesiones') }}" type="button" class="btn btn-inverse">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

