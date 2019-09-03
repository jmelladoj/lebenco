@section('title', 'LEBENCO - Informe de Ventas')

@section('seccion', 'Informe de Ventas')

@extends('layouts.intranet')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="form" action="{{ url('/informeVentas') }}">
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
                                    <button type="button" class="btn btn-warning" data-column="0"> ID VENTA </button>
                                    <button type="button" class="btn btn-warning" data-column="1"> FECHA </button>
                                    <button type="button" class="btn btn-warning" data-column="2"> MONTO </button>
                                    <button type="button" class="btn btn-warning" data-column="3"> USUARIO </button>
                                </div>
                            </div>
                        </div>
                    </form> 
                    <div class="table-responsive m-t-40">
                        <table id="tablaVentas" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID VENTA</th>
                                    <th>FECHA</th>
                                    <th>MONTO</th>
                                    <th>USUARIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $venta)
                                    <tr>
                                        <td align="center">{{ $venta->id }}</td>
                                        <td align="center">{{ $venta->created_at }}</td>
                                        <td align="center">${{ number_format($venta->monto_venta)}}</td>
                                        <td>{{ $venta->user->nombre }}</td>
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


