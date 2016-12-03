<?php include_once('config.app.php'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js" type="text/javascript"></script>


<form name="ovulacion_form" method="post" id="ovulacion_form">
        <div class="p_table2 p_table active pro col-md-5">
                <span class="hot_p"></span>
                <header style="

                height: 32px;
                border-color: #000;
                background-color: #F4A4C9;
                color: white;
                width: 100%;
                text-align: center;
                border-radius: 10px;
                padding-top: 5px;

                ">Calculadora</header>
                <div class="price">
                        <dl>

                        </dl>
                </div>
                <ul class="p_list">
                        <label for="pen_fur">Penúltima Menstruación:</label>
                        <input name="pen_fur" id="pen_fur" type="date" value=""><br>
                        <label for="ult_fur">Última Menstruación:</label>
                        <input name="ult_fur" id="ult_fur" type="date" value="">

                </ul>
                <footer style="text-align: center;">
                        <button type="button" class="btn btn-default" id="calcular"><span>Calcular</span></button>
                </footer>
        </div>
</form>

<div class="p_table basic col-md-7">
        <header style="
        height: 32px;
        border-color: #000;
        background-color: #F4A4C9;
        color: white;
        width: 100%;
        text-align: center;
        border-radius: 10px;
        padding-top: 5px;

        ">Resultado</header>
        <div class="price">
                <dl>
                        <dt><p id="resultado"></p></dt>

                </dl>
        </div>
        <ul class="p_list">
                Ingresa los datos solicitados al costado izquierdo y haz clic en calcular.

        </ul>

</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

        //calculo resultados con js libreria momentjs
        $(function(){
                $.ajaxSetup({
                        cache: true
                });

                $('#calcular').click(function(event){
                        event.preventDefault();
                        moment.locale('es');
                        var pen_fur = $('#pen_fur').val(), ult_fur = $('#ult_fur').val();

        //pen_fur = pen_fur.replace('-','/');
        //ult_fur = ult_fur.replace('-','/');
        if($('#pen_fur').prop('type') != 'date'){
                pen_fur = moment(pen_fur, "DD-MM-YYYY");
                ult_fur = moment(ult_fur, "DD-MM-YYYY");
        } else {
                pen_fur = moment(pen_fur);
                ult_fur = moment(ult_fur);
        }
        var diff = ult_fur.diff(pen_fur, 'days');
        var middiff = Math.round(diff/2);

        var anterior = pen_fur.clone();
        anterior = anterior.add(middiff, 'days').format('DD [de] MMMM YYYY');

        var siguiente = ult_fur.clone();
        siguiente = siguiente.add(middiff, 'days').format('DD [de] MMMM YYYY');

        var menst = ult_fur.clone();
        menst = menst.add(diff, 'days').format('DD [de] MMMM YYYY');

        //alert(ult_fur.diff(pen_fur, 'days'));
        var duracion = "* La duración de tu ciclo fue de <b>"+diff+" días</b><br>";
        anterior = "* Tu ovulación anterior fue el día <b>"+anterior+"</b><br>";
        siguiente = "* Tu próxima ovulación será el día <b>"+siguiente+"</b><br>";
        menst    = "* Tu próxima menstruación será el día <b>"+menst+"</b><br>";
        var post = "<br><span class='info-calc'><i class='fa fa-info-circle'></i>Si la duración de tu ciclo es superior a 35 días o inferior a 21 días, o tu ciclo es irregular, los resultados del calculo pueden resultar inexactos.</span>";
        $('#resultado').html(duracion+anterior+siguiente+menst+post);
});
        });
</script>
<script>

        //Calendario JS en caso de que el dispositivo no tenga el propio
        $(function(){
                if($('#pen_fur').prop('type') != 'date'){
                        $("head").append('<link id="datepickercss" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" />');
                        $.getScript( 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js', function(){
                                var $ = jQuery;
                                $("input[type=date]").datepicker({
                                        dateFormat: 'dd-mm-yy'
                                });
                        // Traducción al español
                        $(function($){
                                $.datepicker.regional['es'] = {
                                        closeText: 'Cerrar',
                                        prevText: '<Ant',
                                        nextText: 'Sig>',
                                        currentText: 'Hoy',
                                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                                        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                                        weekHeader: 'Sm',
                                        dateFormat: 'dd/mm/yy',
                                        firstDay: 1,
                                        isRTL: false,
                                        showMonthAfterYear: false,
                                        yearSuffix: ''
                                };
                                $.datepicker.setDefaults($.datepicker.regional['es']);
                        });
                });

                }
        });
</script>

