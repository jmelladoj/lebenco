@section('title', 'LEBENCO - Agregar saldo')

@section('seccion', 'Agregar saldo')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Agregar saldo</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('/usuarios/'.  $usuario->id  . '/cargar') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="saldo" class="col-2 col-form-label">Saldo a cargar *</label>
                                <div class="col-10">
                                    <input type="text" id="saldo" name="saldo" class="form-control" required="" value="{{ old('saldo') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/usuarios') }}" type="button" class="btn btn-inverse">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

