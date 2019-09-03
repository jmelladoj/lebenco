@section('title', 'LEBENCO - Recargar Saldo')

@section('seccion', 'Recargar Saldo')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <br>
                <center><h4>{{ $mensaje }}</h4></center>
                <br>
                <br>
                <center><a href="{{ url('/recargar') }}" type="button" class="btn btn-success">Recargar</a></center>
            </div>

        </div>
    </div>
@endsection

