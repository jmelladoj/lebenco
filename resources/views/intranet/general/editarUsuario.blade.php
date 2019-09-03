@section('title', 'LEBENCO - Mi perfil')

@section('seccion', 'Mi perfil')

@extends('layouts.intranet')

@section('content')

    @if(Auth::user()->tipo_persona == 1)
        @include('intranet.general.persona');
    @elseif(Auth::user()->tipo_persona == 2)
        @include('intranet.general.empresa');
    @else
        @include('intranet.general.estudiante');
    @endif

@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            obtenerComunas();

            $('.dropify').dropify({
                messages: {
                    'default': 'Arrastra y suelta un archivo aquí o haz clic',
                    'replace': 'Arrastra y suelta o haz clic para reemplazar',
                    'remove':  'Borrar',
                    'error':   'Ooops, ha ocurrido un error.'
                },
                error: {
                    'fileSize': 'El tamaño del archivo es demasiado grande. 2MB max).',
                    'fileExtension': 'Formato no permitido, sólo JPG, PNG O JPEG.'
                }
            });
            
        });

        function desmarcarRadios(){
            $('input:radio').each(function(){
                $(this).prop('checked', false);
            });
        }

        function obtenerComunas(){
            var provincia_id = $('#provincia').val();

            $.ajax({
                type:'POST',
                url:'/obtenerComunas',
                data:{
                    provincia_id:provincia_id
                },
                success:function(data){
                    $('#comuna').children('option:not(:first)').remove();
                    $('#comuna').prop('selectedIndex',0);

                    $.each(data, function(key,value) {	
                        $('#comuna').append(new Option(value.nombre, value.id));
                    }); 
                    
                    seleccionaComuna();
                }
            });
        }

        function seleccionaComuna(){
            var comuna_id = $('#comuna_id').val();

            if(comuna_id != null){
                $("#comuna option[value='" + comuna_id + "']").attr("selected","selected");
            }
        }
    </script>
@endsection
