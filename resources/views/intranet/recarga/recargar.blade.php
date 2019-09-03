@section('title', 'LEBENCO - Recargar Saldo')

@section('seccion', 'Recargar Saldo')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Recargar saldo</h4>
                </div>
                <div class="card-body">
                    <form class="form" method="post" action="{{ url('recargar') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <label for="saldo" class="col-2 col-form-label">Saldo Actual *</label>
                                <div class="col-4">
                                    <input type="number" id="saldo" name="saldo" class="form-control" min="0" placeholder="0" value="{{ Auth::user()->saldo }}" readonly>
                                </div>

                                <label for="monto_carga" class="col-2 col-form-label">Saldo a cargar *</label>
                                <div class="col-4">
                                    <input type="number" id="monto_carga" name="monto_carga" class="form-control" required="" min="1000" placeholder="0" value="{{ old('monto_carga') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Recargar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

