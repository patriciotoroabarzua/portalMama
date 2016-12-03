
<!DOCTYPE html>
<html>
<?php define('DB_SERVER', '209.126.119.59');
define('DB_USERNAME', 'portalmama');
define('DB_PASSWORD', 'portalmama$01');
define('DB_DATABASE', 'portalmama'); ?>
<?php include_once('model/PortalMamaModel.php'); ?>
<?php $model= new PortalMamaModel(); ?>

<!-- Homepage content -->
<div class="container homepage-content">

	<div class="main-content-column-1">


		<div class="blog-block-1 search-results">
			<br>
			<br>
			<br>
			<div class="title-default">
				<a href="#" class="active">Busqueda</a>
			</div>



			<script>
				function enviaform(){
					document.frmNombre.submit();
				}
			</script>
			<div class="row">
				<div class="col-md-12">
					<br>
					<h2>Buscar Nombre</h2>
					<form name="frmNombre" method="post" action="buscador_nombres.php">
						<div id="custom-search-input">
							<div class="input-group col-md-8">
								<input type="text" name="nombre" class="form-control input-lg" placeholder="Buscar" />
								<span class="input-group-btn">
									<button class="btn btn-info btn-lg" type="button" onclick="enviaform();">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>
							</div>
						</div>
						<input type="hidden" name="accion" value="buscar" />	

					</div>

				</div>
				<div class="row">
					<div class="col-md-4" style="margin: 15px;">
						<label class="radio-inline">
							<input type="radio" name="sexo" id="inlineRadio1" value="f"> Niña
						</label>
						<label class="radio-inline">
							<input type="radio" name="sexo" id="inlineRadio2" value="m"> Niño
						</label>
					</div></div></form>
					<div class="social abc1">
						<a href="buscador_nombres.php?letra=a">A</a>
						<a href="buscador_nombres.php?letra=b">B</a>
						<a href="buscador_nombres.php?letra=c">C</a>
						<a href="buscador_nombres.php?letra=d">D</a>
						<a href="buscador_nombres.php?letra=e">E</a>
						<a href="buscador_nombres.php?letra=f">F</a>
						<a href="buscador_nombres.php?letra=g">G</a>
						<a href="buscador_nombres.php?letra=h">H</a>
						<a href="buscador_nombres.php?letra=i">I</a>
						<a href="buscador_nombres.php?letra=j">J</a>
						<a href="buscador_nombres.php?letra=k">K</a>
						<a href="buscador_nombres.php?letra=l">L</a>
						<a href="buscador_nombres.php?letra=ll">LL</a>
						<a href="buscador_nombres.php?letra=m">M</a>
						<a href="buscador_nombres.php?letra=n">N</a>
						<a href="buscador_nombres.php?letra=nn">Ñ</a>
						<a href="buscador_nombres.php?letra=o">O</a>
						<a href="buscador_nombres.php?letra=p">P</a>
						<a href="buscador_nombres.php?letra=q">Q</a>
						<a href="buscador_nombres.php?letra=r">R</a>
						<a href="buscador_nombres.php?letra=s">S</a>
						<a href="buscador_nombres.php?letra=t">T</a>
						<a href="buscador_nombres.php?letra=v">V</a>
						<a href="buscador_nombres.php?letra=w">W</a>
						<a href="buscador_nombres.php?letra=y">Y</a>
						<a href="buscador_nombres.php?letra=z">Z</a>

					</div>
					<br><br><br>
					<div class="post">	
						<table>
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Origen</th>
									<th>Significado</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php
									if(isset($_GET['letra'])){
										$rsNombres=$model->getNombresLetra($_GET['letra']);
									}elseif(isset($_POST['accion'])){	
										$rsNombres=$model->getNombresBusqueda($_POST);
									}else{
										$rsNombres=$model->getNombresLimit(0,10);
									}
									while(!$rsNombres->EOF){
										echo '<th>'.$rsNombres->fields['nombre'].'</th>
										<td>'.$rsNombres->fields['origen'].'</td>
										<td>'.$rsNombres->fields['descripcion'].'</td>
									</tr>';
									$rsNombres->movenext();
								}
								?>
							</tbody>
						</table>	
					</div>

					
					
					

				</div>


			</div>
			
			<?php
			include_once('siderbar_home.php');
			?>
			
		</div>

		
		<?php
		include_once('footer_home.php');
		?>
		

		
		<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
		
		<script src="js/jquery-1.11.1.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/bootstrap-hover-dropdown.js"></script>
		<script src="js/jquery.particleground.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/jquery.cycle2.scrollVert.js"></script>
		<script src="js/jquery.cycle2.swipe.min.js"></script>
		<script src="js/jquery.hoverintent.min.js"></script>
		<script src="js/jquery.inview.js"></script>
		<script src="js/jquery.ui.core.min.js"></script>
		<script src="js/jquery.ui.effect.min.js"></script>
		<script src="js/jquery.ui.effect-size.min.js"></script>
		<script src="js/jquery.ui.effect-slide.min.js"></script>
		<script src="js/goliath.js"></script>
		
	</body>
	</html>