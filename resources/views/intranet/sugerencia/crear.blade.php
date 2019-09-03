@section('title', 'LEBENCO - Sugerencias')

@section('seccion', 'Sugerencias')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Sugerencias</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('sugerencias') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label id="documento" class="col-2 control-label">Documento *</label>
                                <div class="col-4">
                                    <select class="form-control custom-select" tabindex="1" id="documento" name="documento">
                                        <option value="">SUGERENCIA GENERAL</option>
                                        
                                        @foreach ($documents as $documento)
                                            <option value="{{ $documento->id }}">{{ $documento->titulo }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="asunto" class="col-2 col-form-label">Asunto *</label>
                                <div class="col-4">
                                    <input type="text" id="asunto" name="asunto" class="form-control" required="" min="0" placeholder="" value="{{ old('asunto') }}">
                                </div>
                            </div>

                            <div class="form-group m-t-40 row">
                                <label for="asunto" class="col-2 col-form-label">Detalles *</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" id="mensaje" name="mensaje">{{ old('mensaje') }}</textarea>
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
