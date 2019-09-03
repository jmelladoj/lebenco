@section('title', 'LEBENCO - Sugerencias')

@section('seccion', 'Hilo de conversa')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Asunto: {{ $suggestion->asunto }}</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('sugerencias/' . Crypt::encryptString($suggestion->id) . '/leer/' ) }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40">
                                <label for="" class="col-2 col-form-label">Mensaje *</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" id="mensaje" name="mensaje" readonly>{{ $suggestion->detalle }}</textarea>
                                </div>
                            </div>

                            @foreach ($chats as $chat)
                                <div class="form-group m-t-40">
                                    <label for="" class="col-2 col-form-label">Mensaje *</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="mensaje" name="mensaje" readonly>{{ $chat->detalle }}</textarea>
                                    </div>
                                </div>                                
                            @endforeach

                            <div class="form-group m-t-40">
                                <label for="" class="col-2 col-form-label">Respuesta *</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" id="respuesta" name="respuesta">{{ old('respuesta') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Responder</button>
                            <a href="{{ url('/sugerencias') }}" type="button" class="btn btn-inverse">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
