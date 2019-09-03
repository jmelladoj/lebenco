@section('title', 'LEBENCO - Participantes')

@section('seccion', 'Participantes')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <h4 class="card-title">Participantes rifa {{ $rifa->titulo }}</h4>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="tablaRifas" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>RUT</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participantes as $participante)
                                    <tr>
                                        <td>{{ $participante->user->id }}</td>
                                        <td>{{ $participante->user->nombre }}</td>
                                        <td>{{ $participante->user->run }}</td>
                                        <td class="text-center">                                                
                                            <form method="post" action="{{ url('/rifas/ganador/' . $participante->user->id ) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-simple" data-toggle="tooltip" title="Marcar como ganador"><i class="fa fa-check"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#tablaRifas').DataTable({language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" }});

            $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            // other options
            });

        });
    </script>
@endsection


