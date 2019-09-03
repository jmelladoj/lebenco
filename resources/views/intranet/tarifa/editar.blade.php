@section('title', 'LEBENCO - Editar una tarifa')

@section('seccion', 'Editar una tarifa')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Editar una tarifa</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('tarifas/'.$rate->id.'/editar') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="monto" class="col-2 col-form-label">Monto *</label>
                                <div class="col-4">
                                    <input type="number" id="monto" name="monto" class="form-control" required="" min="0" value="{{ old('monto', $rate->monto) }}">
                                </div>

                                <label for="bonificacion" class="col-2 col-form-label">Bonificación *</label>
                                <div class="col-4">
                                    <input type="number" id="bonificacion" name="bonificacion" class="form-control" required="" min="0" value="{{ old('bonificacion', $rate->bonificacion) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a href="{{ url('/tarifas') }}" type="button" class="btn btn-inverse">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

