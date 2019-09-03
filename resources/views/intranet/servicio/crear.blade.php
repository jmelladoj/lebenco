@section('title', 'LEBENCO - Crear slider')

@section('seccion', 'Crear Servicios')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Añadir Servicios</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('servicios') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="titulo" class="col-2 col-form-label">Servicio *</label>
                                <div class="col-4">
                                    <input type="text" id="titulo" name="titulo" class="form-control" required="" value="{{ old('titulo') }}">
                                </div>

                                <label for="clase" class="col-2 col-form-label">Clase *</label>
                                <div class="col-4">
                                    <input type="text" id="clase" name="clase" class="form-control" value="{{ old('clase') }}" /> 
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label id="descripcion" class="col-2 control-label">Descripción *</label>
                                <div class="col-10">
                                    <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/servicios') }}" type="button" class="btn btn-inverse">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection


