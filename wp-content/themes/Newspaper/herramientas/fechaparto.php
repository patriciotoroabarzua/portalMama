
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js" type="text/javascript"></script>



<!-- Homepage content -->
<div class="container homepage-content">

        <div class="main-content-column-1">

                <div>

                        <div class="p_table active pro col-md-5">
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
                                                <dt></dt>
                                                <dd>Ingresa la fecha de inicio de tu última menstruación y descubre cuándo nacerá tu bebé!
                                                </dd>
                                        </dl>
                                </div>
                                <ul class="p_list">
                                        <label for="ult_fur">Última Menstruación:</label>
                                        <input name="ult_fur" id="ult_fur" type="date" size="12" value=""/>


                                </ul>

                                <footer style="
                                text-align: center;
                                ">
                                <button type="button" class="btn btn-default" name="enviar_fur" id="enviar_fur"><span>Calcular</span></button>
                        </footer>
                </div>

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
                <footer>
                        <a href="#"></a>
                </footer>
        </div>






        <script>
                //calculo resultados con js libreria momentjs
                jQuery(document).ready(function($){
                        $.ajaxSetup({
                                cache: true
                        });
                        $('#enviar_fur').click(function(){
                                //event.preventDefault();
                                moment.locale('es');
                                var ult_fur = $('#ult_fur').val(), today = moment();

                                if($('#ult_fur').prop('type') != 'date'){
                                        ult_fur = moment(ult_fur, "DD-MM-YYYY");
                                } else {
                                        ult_fur = moment(ult_fur);
                                }
                                var semanas = ult_fur.clone();
                                var weeks = today.diff(semanas, 'weeks');
                                var diasresto = today.diff(ult_fur.clone(), 'days') - (weeks*7);
                                if(diasresto > 0){
                                        diasresto = ', '+diasresto+' días ';
                                } else {
                                        diasresto = '';
                                }
                                var fechaparto, parto, post;

                                if(weeks < 0){
                                        semanas = "Según tu FUR, no estás embarazada, o ingresaste la fecha incorrectamente.";
                                        parto = "";
                                        post = "";

                                } else {
                                        semanas = "¡¡ Felicidades !! Tienes <b>"+today.diff(semanas, 'weeks')+" semanas "+diasresto+"de embarazo </b>.<br>";

                                        fechaparto = ult_fur.add(280, 'd').format('DD [de] MMMM YYYY');;
                                        parto = "La <b>fecha probable de parto</b> es el día <b>"+fechaparto+"</b><br>";
                                        post = "<p class='info-calc'><i class='fa fa-info-circle'></i>El resultado es una fecha prevista de parto aproximada, y no una fecha exacta. El nacimiento de tu bebé puede ocurrir desde los 15 días anteriores y los 15 días posteriores a esta fecha señalada.</p>";
                                }
                                $('#resultado').html(semanas+parto+post);
                        });
                });

        </script>
        <script>

                //Calendario JS en caso de que el dispositivo no tenga el propio
                jQuery(function($){
                        if($('#ult_fur').prop('type') != 'date'){
                                $("head").append('<link id="datepickercss" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" />');
                                $.getScript( 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js', function(){
                                        var $ = jQuery;
                                        $("#mydiv").datepicker({
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



                </div>
        </div>



</div>

