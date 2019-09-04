$(function () {
    "use strict";

    var lunes = $("#lunes").val();
    var martes = $("#martes").val();
    var miercoles = $("#miercoles").val();
    var jueves = $("#jueves").val();
    var viernes = $("#viernes").val();
    var sabado = $("#sabado").val();
    var domingo = $("#domingo").val();
    
    var lunesR = $("#lunesR").val();
    var lunesU = $("#lunesU").val();
    var lunesD = $("#lunesD").val();

    var martesR = $("#martesR").val();
    var martesU = $("#martesU").val();
    var martesD = $("#martesD").val();

    var miercolesR = $("#miercolesR").val();
    var miercolesU = $("#miercolesU").val();
    var miercolesD = $("#miercolesD").val();
    
    var juevesR = $("#juevesR").val();
    var juevesU = $("#juevesU").val();
    var juevesD = $("#juevesD").val();

    var viernesR = $("#viernesR").val();
    var viernesU = $("#viernesU").val();
    var viernesD = $("#viernesD").val();

    var sabadoR = $("#sabadoR").val();
    var sabadoU = $("#sabadoU").val();
    var sabadoD = $("#sabadoD").val();

    var domingoR = $("#domingoR").val();
    var domingoU = $("#domingoU").val();
    var domingoD = $("#domingoD").val();




    var dias = ["DOM", "LUN", "MAR", "MIE", "JUE", "VIE", "SAB"]; 
    


    Morris.Area({
        element: 'morris-area-chart'
        , data: [{
                period: lunes
                , Recargas: lunesR
                , Usuarios: lunesU
                , Documentos: lunesD
        }, {
                period: martes
                , Recargas: martesR
                , Usuarios: martesU
                , Documentos: martesD
        }, {
                period: miercoles
                , Recargas: miercolesR
                , Usuarios: miercolesU
                , Documentos: miercolesD
        }, {
                period: jueves
                , Recargas: juevesR
                , Usuarios: juevesU
                , Documentos: juevesD
        }, {
                period: viernes
                , Recargas: viernesR
                , Usuarios: viernesU
                , Documentos: viernesD
        }, {
                period: sabado
                , Recargas: sabadoR
                , Usuarios: sabadoU
                , Documentos: sabadoD
        }
            , {
                period: domingo
                , Recargas: domingoR
                , Usuarios: domingoU
                , Documentos: domingoD
        }]
        , xkey: 'period'
        , ykeys: ['Recargas', 'Usuarios', 'Documentos']
        , labels: ['Recargas', 'Usuarios', 'Documentos']
        , xLabelFormat: function(d) {
          return dias[d.getDay()];
        }
        , pointSize: 3
        , fillOpacity: 0
        , pointStrokeColors: ['#8AB733', '#E8ECD1', '#3F8A24']
        , behaveLikeLine: true
        , gridLineColor: '#e0e0e0'
        , lineWidth: 3
        , hideHover: 'auto'
        , lineColors: ['#8AB733', '#E8ECD1', '#3F8A24']
        , resize: true
    });

});    
    // sparkline
    var sparklineLogin = function() { 
        $('#sales1').sparkline([20, 40, 30], {
            type: 'pie',
            height: '90',
            resize: true,
            sliceColors: ['#01c0c8', '#7d5ab6', '#ffffff']
        });
        $('#sparkline2dash').sparkline([6, 10, 9, 11, 9, 10, 12], {
            type: 'bar',
            height: '154',
            barWidth: '4',
            resize: true,
            barSpacing: '10',
            barColor: '#25a6f7'
        });
        
    };    
    var sparkResize;
 
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineLogin, 500);
        });
        sparklineLogin();
