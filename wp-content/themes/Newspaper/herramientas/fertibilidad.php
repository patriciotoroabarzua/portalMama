<?php
include_once('config.app.php');
?>

	<div>
		<script>
			function enviarcalcular(){
				document.formfertibilidad.submit();
			}
		</script>



		<form method="post" name="formfertibilidad" action="#">
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

			">
			<div>Calculadora</div>
		</header>
		<div class="price">
			<dl>
				<dt></dt>
				<dd>Ingresa la fecha de inicio de tu última menstruación!
				</dd>
			</dl>
		</div>
		<ul class="p_list" style="padding-left: 0px;">
			Por favor, seleccione el primer día de su último periodo menstrual:<br>

			<select name="dateday">
				<?php

				for($i=1;$i<32;$i++){
					$selected="";
					if(isset($_POST['dateday']) and $i==$_POST['dateday'])
						$selected="selected";
					echo '<option id="'.$i.'" '.$selected.'>'.$i.'</option>';
				}
				?>
			</select> / 
			<select name="datemonth">
				<?php
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

				for($i=1;$i<13;$i++){
					$selected="";
					if(isset($_POST['datemonth']) and $i==$_POST['datemonth'])
						$selected="selected";
					echo '<option value="'.$i.'" '.$selected.'>'.$meses[$i].'</option>';

				}
				?>

			</select> / 
			<select name="dateyear">
				<option>2014</option>
				<option selected="">2015</option>
				<option>2016</option>
			</select>


			Número habitual de días en su ciclo:


			<select name="days">
				<?php

				for($i=20;$i<46;$i++){
					$selected="";
					if(isset($_POST['days']) and $_POST['days'] == $i){
						$selected="selected";
					}

					echo '<option id="'.$i.'" '.$selected.'>'.$i.'</option>';
				}
				?>
			</select>

		</ul>
		<footer style="
		text-align: center;
		">

		<button type="button" class="btn btn-default" onclick="enviarcalcular();"><span>Calcular</span></button>
		<input type="hidden" name="accion" value="calcular">
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

	">
	<div>Resultado</div>
</header>
<div class="price">
	<dl>
		<dt>
			<p id="resultado">
				<?php
				if(isset($_POST['accion']) and $_POST['accion']=='calcular'){
										//print_r($_POST);
					if($_POST['days']>=28 and $_POST['days']<=30){

						$fecha = date_create($_POST['dateyear']."-".$_POST['datemonth']."-".$_POST['dateday']);
						date_add($fecha, date_interval_create_from_date_string('12 days'));
						$dia1=date_format($fecha, 'd');
						$mes1=date_format($fecha, 'n');
						$ano1=date_format($fecha, 'Y');

						$fecha = date_create($_POST['dateyear']."-".$_POST['datemonth']."-".$_POST['dateday']);
						date_add($fecha, date_interval_create_from_date_string('14 days'));
						$dia2=date_format($fecha, 'd');
						$mes2=date_format($fecha, 'n');
						$ano2=date_format($fecha, 'Y');

						$fecha = date_create($_POST['dateyear']."-".$_POST['datemonth']."-".$_POST['dateday']);
						date_add($fecha, date_interval_create_from_date_string('16 days'));
						$dia3=date_format($fecha, 'd');
						$mes3=date_format($fecha, 'n');
						$ano3=date_format($fecha, 'Y');

					}else{
						if($_POST['days']>=20 and $_POST['days']<=35){

							$fecha = date_create($_POST['dateyear']."-".$_POST['datemonth']."-".$_POST['dateday']);
							date_add($fecha, date_interval_create_from_date_string('5 days'));
							$dia1=date_format($fecha, 'd');
							$mes1=date_format($fecha, 'n');
							$ano1=date_format($fecha, 'Y');

							$fecha = date_create($_POST['dateyear']."-".$_POST['datemonth']."-".$_POST['dateday']);
							date_add($fecha, date_interval_create_from_date_string('7 days'));
							$dia2=date_format($fecha, 'd');
							$mes2=date_format($fecha, 'n');
							$ano2=date_format($fecha, 'Y');

							$fecha = date_create($_POST['dateyear']."-".$_POST['datemonth']."-".$_POST['dateday']);
							date_add($fecha, date_interval_create_from_date_string('9 days'));
							$dia3=date_format($fecha, 'd');
							$mes3=date_format($fecha, 'n');
							$ano3=date_format($fecha, 'Y');

						}
					}
										//$fecha=date('d/m/Y', strtotime())+14;
										//echo $fecha;
					?>

					Estos son los resultados basados en la información que ha proporcionado:<br>
					Su próximo día más fértil es el <b><?php echo $dia2." - ".$meses[$mes2]." - ".$ano2; ?></b>
					Su próximo período de mayor fertilidad es desde el <b><?php echo $dia1." - ".$meses[$mes1]." - ".$ano1; ?></b> hasta el <b><?php echo $dia3." - ".$meses[$mes3]." - ".$ano3; ?></b>.<br>										


					<?php
				}
				?>
			</p>
		</dt>

	</dl>
</div>
<ul class="p_list">
	Ingresa los datos solicitados al costado izquierdo y haz clic en calcular.

</ul>
<footer>
	<a href="#"></a>
</footer>
</div>



</div>					

