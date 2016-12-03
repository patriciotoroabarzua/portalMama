<?php


$accion="";
if(isset($_GET['accion'])){
    $accion=$_GET['accion'];
}elseif(isset($_POST['accion'])){
    $accion=$_POST['accion'];
}


// default timezone
ini_set('date.timezone', 'UTC');
// echo DS."<br>";
// echo APP_PATH."<br>";
// echo ASSETS_PATH."<br>";
// $arreglo= array(APP_PATH, get_include_path());
// echo "<pre>";
// print_r($arreglo);
// echo "</pre>";

function getFecha(){
    $dia=date("l");

    if ($dia=="Monday") $dia="Lunes";
    if ($dia=="Tuesday") $dia="Martes";
    if ($dia=="Wednesday") $dia="Miércoles";
    if ($dia=="Thursday") $dia="Jueves";
    if ($dia=="Friday") $dia="Viernes";
    if ($dia=="Saturday") $dia="Sabado";
    if ($dia=="Sunday") $dia="Domingo";

    $mes=date("F");

    if ($mes=="January") $mes="Enero";
    if ($mes=="February") $mes="Febrero";
    if ($mes=="March") $mes="Marzo";
    if ($mes=="April") $mes="Abril";
    if ($mes=="May") $mes="Mayo";
    if ($mes=="June") $mes="Junio";
    if ($mes=="July") $mes="Julio";
    if ($mes=="August") $mes="Agosto";
    if ($mes=="September") $mes="Setiembre";
    if ($mes=="October") $mes="Octubre";
    if ($mes=="November") $mes="Noviembre";
    if ($mes=="December") $mes="Diciembre";

    $ano=date("Y");

    $dia2=date("d");
    return "$dia, $dia2 de $mes de $ano";
}
function getFechaSinFormato($fecha){
    list($ano,$mes,$dia)=explode("-",$fecha);
    //$dia=$dia;

    if ($dia=="Monday") $dia="Lunes";
    if ($dia=="Tuesday") $dia="Martes";
    if ($dia=="Wednesday") $dia="Miércoles";
    if ($dia=="Thursday") $dia="Jueves";
    if ($dia=="Friday") $dia="Viernes";
    if ($dia=="Saturday") $dia="Sabado";
    if ($dia=="Sunday") $dia="Domingo";

    //$mes=date("F");

    if ($mes==1) $mes="Enero";
    if ($mes==2) $mes="Febrero";
    if ($mes==3) $mes="Marzo";
    if ($mes==4) $mes="Abril";
    if ($mes==5) $mes="Mayo";
    if ($mes==6) $mes="Junio";
    if ($mes==7) $mes="Julio";
    if ($mes==8) $mes="Agosto";
    if ($mes==9) $mes="Setiembre";
    if ($mes==10) $mes="Octubre";
    if ($mes==11) $mes="Noviembre";
    if ($mes==12) $mes="Diciembre";

    //$ano=date("Y");

    $dia2=date("d");
    return "$dia de $mes de $ano";
}

