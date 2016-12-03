

<!-- Homepage content -->
<div class="container homepage-content">

    <div class="main-content-column-1">

            <div>

                    <?php
                    $anos=array();
                    $anos[0]=array('','','','','','','','','','','','');
                    $anos[1]=array('','','','','','','','','','','','');
                    $anos[2]=array('','','','','','','','','','','','');
                    $anos[3]=array('','','','','','','','','','','','');
                    $anos[4]=array('','','','','','','','','','','','');
                    $anos[5]=array('','','','','','','','','','','','');
                    $anos[6]=array('','','','','','','','','','','','');
                    $anos[7]=array('','','','','','','','','','','','');
                    $anos[8]=array('','','','','','','','','','','','');
                    $anos[9]=array('','','','','','','','','','','','');
                    $anos[10]=array('','','','','','','','','','','','');
                    $anos[12]=array('','','','','','','','','','','','');
                    $anos[13]=array('','','','','','','','','','','','');
                    $anos[14]=array('','','','','','','','','','','','');
                    $anos[15]=array('','','','','','','','','','','','');
                    $anos[16]=array('','','','','','','','','','','','');
                    $anos[17]=array('','','','','','','','','','','','');
                    $anos[18]=array('a','o','a','o','o','o','o','o','o','o','o','o');
                    $anos[19]=array('o','a','o','a','a','o','o','a','o','o','a','a');
                    $anos[20]=array('a','o','a','o','o','o','o','o','o','a','o','o');
                    $anos[21]=array('o','a','a','a','a','a','a','a','a','a','a','a');
                    $anos[22]=array('a','o','o','a','o','a','a','o','a','a','a','a');
                    $anos[23]=array('o','o','o','a','o','o','a','a','a','o','o','a');
                    $anos[24]=array('o','a','a','o','o','a','o','a','o','o','a','o');
                    $anos[25]=array('a','o','a','o','o','o','a','o','a','o','o','o');
                    $anos[26]=array('o','o','o','o','o','a','o','a','a','o','a','a');
                    $anos[27]=array('a','a','o','o','o','o','a','a','o','a','o','o');
                    $anos[28]=array('o','o','o','a','a','o','a','o','a','a','o','a');
                    $anos[29]=array('a','o','a','a','a','a','a','o','a','o','a','a');
                    $anos[30]=array('o','o','a','o','o','o','o','o','o','o','o','o');
                    $anos[31]=array('o','o','o','o','o','a','o','a','o','a','a','a');
                    $anos[32]=array('o','a','a','o','o','o','o','a','o','o','a','o');
                    $anos[33]=array('a','o','o','a','a','o','a','o','a','o','o','a');
                    $anos[34]=array('o','o','a','a','a','a','o','o','a','o','a','a');
                    $anos[35]=array('o','a','o','a','a','a','o','a','o','o','a','o');
                    $anos[36]=array('o','a','o','o','o','a','o','o','a','a','a','a');
                    $anos[37]=array('a','a','o','a','a','a','o','a','a','o','o','o');
                    $anos[38]=array('o','o','a','a','a','a','a','o','a','a','o','');
                    $anos[39]=array('a','a','o','a','a','a','o','a','o','o','a','o');
                    $anos[40]=array('o','o','o','a','a','a','o','a','o','a','a','o');
                    $anos[41]=array('a','a','o','a','a','o','a','a','o','a','o','a');
                    $anos[42]=array('o','a','a','o','o','o','o','o','a','o','a','o');
                    $anos[43]=array('a','o','a','a','a','o','o','a','a','a','o','o');
                    $anos[44]=array('o','a','a','a','a','o','o','o','a','o','a','o');
                    $anos[45]=array('a','o','a','o','o','o','o','a','o','a','o','a');


                    $meses=array();
                    $meses[]='';
                    $meses[]='Enero';
                    $meses[]='Febrero';
                    $meses[]='Marzo';
                    $meses[]='Abril';
                    $meses[]='Mayo';
                    $meses[]='Junio';
                    $meses[]='Julio';
                    $meses[]='Agosto';
                    $meses[]='Septiembre';
                    $meses[]='Octubre';
                    $meses[]='Noviembre';
                    $meses[]='Diciembre';
                    ?>
                    <script>
                            function enviarcalcular(){
                                    document.frmsexobebe.submit();
                            }
                    </script>
                    <form name="frmsexobebe" method="post" action="#">



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
                                    <?php
                                    //print_r($_POST);
                                    ?>
                                    <div class="price">
                                            <dl>

                                            </dl>
                                    </div>
                                    <ul class="p_list">
                                            <input type="hidden" name="accion" value="calcular"/>
                                            <label for="ult_fur">Por favor, Indica tu edad:</label>
                                            <select name="dateday" class="form-control">
                                                    <?php

                                                    for($i=18;$i<46;$i++){
                                                            $selected="";
                                                            if(isset($_POST['dateday']) and $i==$_POST['dateday'])
                                                                    $selected="selected";
                                                            echo '<option id="'.$i.'" '.$selected.'>'.$i.'</option>';
                                                    }
                                                    ?>
                                            </select>
                                            Por favor, indica mes de la concepción:
                                            <select name="datemonth" class="form-control">
                                                    <?php
                                                    $meses=array();
                                                    $meses[]='Enero';
                                                    $meses[]='Febrero';
                                                    $meses[]='Marzo';
                                                    $meses[]='Abril';
                                                    $meses[]='Mayo';
                                                    $meses[]='Junio';
                                                    $meses[]='Julio';
                                                    $meses[]='Agosto';
                                                    $meses[]='Septiembre';
                                                    $meses[]='Octubre';
                                                    $meses[]='Noviembre';
                                                    $meses[]='Diciembre';

                                                    for($i=0;$i<12;$i++){
                                                            $selected="";
                                                            if(isset($_POST['datemonth']) and $i==$_POST['datemonth'])
                                                                    $selected="selected";
                                                            echo '<option value="'.$i.'" '.$selected.'>'.$meses[$i].'</option>';

                                                    }
                                                    ?>

                                            </select>

                                    </ul>
                                    <footer style="
                                    text-align: center;
                                    ">
                                    <button type="button" class="btn btn-default" onclick="enviarcalcular();"><span>Calcular</span></button>
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
                                    <dt><p id="resultado">
                                            <?php
                                            if(isset($_POST['accion']) and $_POST['accion']=='calcular'){

                                                    echo 'Tu Bebé Será: ';

                                                    if($anos[$_POST['dateday']][$_POST['datemonth']]=='a'){
                                                            echo '<b>Niña</b>';
                                                    }elseif($anos[$_POST['dateday']][$_POST['datemonth']]=='o'){
                                                            echo '<b>Niño</b>';
                                                    }
                                                    echo '<p style="font-size:13px; text-align:left;line-height:16px; padding-left:15px;">* En ningún caso este resultado sustituye al que puedes obtener mediante una ecografía o a la opinión de tu médico. Si quieres tener un resultado 100% fiable, acude al doctor. </p>';
                                            }
                                            ?>
                                    </p></dt>

                            </dl>
                    </div>
                    <ul class="p_list">
                            Ingresa los datos solicitados al costado izquierdo y haz clic en calcular.

                    </ul>
            </div>



    </div>




    </div>
</div>




