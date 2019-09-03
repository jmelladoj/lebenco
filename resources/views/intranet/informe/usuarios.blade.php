@section('title', 'LEBENCO - Informe de Usuarios')

@section('seccion', 'Informe de Usuarios')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="form" action="{{ url('/informeUsuarios') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group m-t-40 row">
                                <div class="col-md-3"><label class="col-form-label">Rango de fechas: </label></div>
                                <div class="col-md-3"><input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required="" min="0" placeholder="0" value="{{ old('fecha_inicio', $fecha_inicio) }}"></div>
                                <div class="col-md-3"><input type="date" id="fecha_termino" name="fecha_termino" class="form-control" required="" min="0" placeholder="0" value="{{ old('fecha_termino', $fecha_termino) }}"></div>
                                <div class="col-md-3"><button type="submit" class="btn btn-info btn-block"><i class="fa fa-search"></i> Ver</button></div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <div class="col-md-2"><label class="col-form-label">Esconder Columnas: </label></div>
                                <div class="col-md-10 btn-group btn-group-justified">
                                    <button type="button" class="btn btn-warning" data-column="0"> ID USUARIO </button>
                                    <button type="button" class="btn btn-warning" data-column="1"> NOMBRE </button>
                                    <button type="button" class="btn btn-warning" data-column="2"> EMAIL </button>
                                    <button type="button" class="btn btn-warning" data-column="3"> CREACIÓN CUENTA </button>
                                    <button type="button" class="btn btn-warning" data-column="4"> ÚLTIMA CONEXIÓN </button>
                                    <button type="button" class="btn btn-warning" data-column="5"> ÚLTIMA RECARGA </button>
                                </div>
                            </div>
                        </div>
                    </form> 
                    <div class="table-responsive m-t-40">
                        <table id="tablaVentas" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID USUARIO</th>
                                    <th>NOMBRE</th>
                                    <th>EMAIL</th>
                                    <th>CREACIÓN CUENTA</th>
                                    <th>ÚLTIMA CONEXIÓN</th>
                                    <th>TOTAL DESCARGAS</th>
                                    <th>ÚLTIMA RECARGA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td align="center">{{ $user->id }}</td>
                                        <td>{{ $user->nombre }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td align="center">{{ $user->created_at }}</td>
                                        <td align="center">{{ $user->last_login }}</td>
                                        <td align="center">{{ $user->totalDescargas }}</td>
                                        <td align="center">@if($user->UltimaDescarga) {{ $user->UltimaDescarga->created_at }} @else No registra recargas @endif</td>
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

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  


    <script>
        $(document).ready(function() {
            var table = $('#tablaVentas').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                    

                ],
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" }
            });

            $('button.btn-warning').on( 'click', function (e) {

                e.preventDefault();
        
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
        
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        });
    </script> 
@endsection

