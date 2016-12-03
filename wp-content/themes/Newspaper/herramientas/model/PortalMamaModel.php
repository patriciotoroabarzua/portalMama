<?php

class PortalMamaModel
{

    protected $db;
	
    function PortalMamaModel()
    {
        $this->db = ADONewConnection("mysqli");
        $this->db->Connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $this->db->debug = false;
        $this->db->execute("SET NAMES 'utf8'");
    }
    function executeQuery($sql){
        return $this->db->Execute($sql);
    }
	
    function changeDebugState($state)
    {
		
        $this->db->debug = $state;

    }
	function guardaEncuesta($post){
		$sql="insert into concurso values ('',".$post['consurso'].",'".$post['nombre']."','".$post['email']."','".$post['respuesta']."',sysdate())";
		$this->db->execute($sql);
	}
	function getNombresLetra($letra="",$sexo="",$start="",$end=""){
	$sql="select * from nombres where 1=1";
	if($letra!=""){
			$sql.=" and lower(nombre) like '".$letra."%'";
		}
		if($sexo!=""){
			$sql.=" and sexo = '".$sexo."'";
		}
		if($start!="" and $end != "")	
				$sql .= " LIMIT ".$start.",".$end;
		return $this->db->execute($sql);
	}
	function getNombres($id="",$start="",$end=""){
	$sql="select * from nombres where 1=1";
		if($id!=""){
			$sql.=" and id=".$id;
		}
		$sql.=" order by nombre ASC";
		//echo " LIMIT ".$start.",".$end;
		if($start!="" and $end != ""){	
			$sql .= " LIMIT ".$start.",".$end;
		}		
		return $this->db->execute($sql);
	}
	function getNombresLimit($start,$end){
	$sql="select * from nombres where 1=1";
		
		$sql.=" order by nombre ASC";
		//echo " LIMIT ".$start.",".$end;
		//if($start!="" and $end != ""){	
			$sql .= " LIMIT ".$start.",".$end;
		//}		
		return $this->db->execute($sql);
	}
	function getNombresBusqueda($post,$start="",$end=""){
	$sql="select * from nombres where 1=1";
		if($post['sexo']!=""){
			$sql.=" and sexo='".$post['sexo']."'";
		}
		if($post['nombre']!=""){
			$sql.=" and nombre like '%".$post['nombre']."%'";
		}
		if($start!="" and $end != "")	
				$sql .= " LIMIT ".$start.",".$end;
		return $this->db->execute($sql);
	}
	
	
	function getSantoByFecha($dia,$mes){

		$sql="select * from santos where dia=".$dia." and mes=".$mes;

		$rs=$this->db->execute($sql);
		return $rs->fields['nombre'];
	}
	
	function getTags($id=""){
		$sql="select * from tags where 1=1";
		if($id!=""){
			$sql.=" and id=".$id;
		}
		return $this->db->execute($sql);
	}
	function getTagsLimit($inicio,$fin){
		$sql="select * from tags order by rand() limit ".$inicio.",".$fin;

		return $this->db->execute($sql);
	}
	function getNoticiasDestacado($start=0,$end){
		$sql="select * from noticia where destacado = 1 and estado = 1 order by id_noticia DESC";
		
			$sql.=" limit ".$start.",".$end;
		return $this->db->Execute($sql);
	}
	
	function getNoticiasVideo($limit=""){
		$sql="select * from noticia where tipo = 2 and tipovideo = 1 and estado = 1";
		if($limit!="")
			$sql.=" limit 0,".$limit;
		return $this->db->Execute($sql);
	}
	
	function getLoMasVisto($limit=""){
		$sql="select * from noticia where estado = 1";
		if($limit!="")
			$sql.=" ORDER BY visitas DESC limit 0,".$limit;
		return $this->db->Execute($sql);
	}
	
	function getTagByNoticia($id){
		$sql="select * from tags_noticias where noticia=".$id;
		return $this->db->execute($sql);
	}
	
	function getNoticiasVideos($limit=""){
		$sql="select * from noticia where tipovideo = 1 and estado = 1 order by id_noticia DESC";
		if($limit!="")
			$sql.=" limit 0,".$limit;
		return $this->db->Execute($sql);
	}
	
	function getNoticiasCentral($limit=""){
		$sql="select * from noticia where estado = 1 and tipovideo=0 and blog=0 and opinion=0 and reportaje=0 and galeria=0 and viral=0 order by fecha_publicacion DESC";
		if($limit!="")
			$sql.=" limit 0,".$limit;
		return $this->db->Execute($sql);
	}
	
	function getArticulosDestacado($limit=""){
		$sql="select * from noticia where tipo = 1 and destacado = 1 and estado = 1";
		if($limit!="")
			$sql.=" limit 0,".$limit;
		return $this->db->Execute($sql);
	}
	
	function getArticulosNovedades($limit=""){
		$sql="select * from noticia where ultimo_minuto = 1 and estado = 1 order by fecha_publicacion DESC";
		if($limit!="")
			$sql.=" limit 0,".$limit;
		return $this->db->Execute($sql);
	}
	
	function extraeNombreCategoria($id){
			
		$sql="select * from categoria where id = ".$id;
		$rs=$this->db->Execute($sql);		
		return $rs->fields['nombre'];
	}
	function extraeNombreAutor($id){
		$sql="select * from autores where id=".$id;
		$rs=$this->db->Execute($sql);
		return $rs->fields['nombre'];
	}
	function extraeNombreTag($id){
		$sql="select * from tags where id=".$id;
		$rs=$this->db->Execute($sql);
		return $rs->fields['tag'];
	}
	function getCategoriaById($id){
		$sql="select * from categoria where id = ".$id;
		return $this->db->Execute($sql);
	}
	function getCategoriasAll($limit=""){
		$sql="select * from categoria order by orden ASC ".$limit;
		return $this->db->Execute($sql);
	}
	function getSubCategoriaByCategoria($id){
		$sql="select * from subcategoria where categoria = ".$id." order by orden ASC";
		return $this->db->Execute($sql);
	}
	
	function getSubCategoriaById($id){
		$sql="select * from subcategoria where id = ".$id;
		return $this->db->Execute($sql);
	}
	
	function getSubCategoriaByNoticia($id){
		$sql="select * from categorias_noticias where noticia=".$id;
		return $this->db->Execute($sql);
	}
	function getArticulosBySubcategoria($id,$start="",$end=""){
		$sql="SELECT * from noticia where id_noticia in ( 
				select id_noticia FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND `categoria` = ".$id.")";
				
			
				$sql .= " order by fecha_publicacion DESC LIMIT ".$start.",".$end;
				
		return $this->db->Execute($sql);
	}
	function getArticulosByCategoria($id,$start="",$end=""){
		$sql="SELECT distinct * from noticia where id_noticia in ( 
				select id_noticia FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia				
				AND estado = 1
				AND categorias_noticias.`categoria` in (select id from subcategoria where categoria =  ".$id."))";
				
			
				$sql .= " order by fecha_publicacion DESC LIMIT ".$start.",".$end;
				return $this->db->Execute($sql);
	}
	function getTotalArticulosBySubcategoria($id){
		$sql="SELECT count(*) total 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND `categoria` = ".$id;
		$rs=$this->db->Execute($sql);
		if($rs->EOF)
			return 0; 
		return $rs->fields['total'];
	}
	
	function getTotalNoticiasBySubcategoria($id=""){
		$sql="SELECT count(*) total 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2";
				if($id!="")
					$sql .= " AND `categoria` = ".$id;
		$rs=$this->db->Execute($sql);
		if($rs->EOF)
			return 0; 
		return $rs->fields['total'];
	}
	
	function getNoticiasBySubcategoria($id="",$start="",$end=""){
		$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2";
				if($id!="")
					$sql .= " AND `categoria` = ".$id;
				
				$sql .= " order by id_noticia DESC ";
			if($start!="" and $end != "")	
				$sql .= "LIMIT ".$start.",".$end;
				
		return $this->db->Execute($sql);
	}


	function getTotalNoticiasByBusqueda($texto=""){
		$sql="SELECT distinct count(*) total 
		FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND `descripcion` LIKE  '%".$texto."%' ";

		$rs=$this->db->Execute($sql);
		if($rs->EOF)
			return 0; 
		return $rs->fields['total'];
	}
	function getNoticiasByBusqueda($texto="",$start="",$end=""){
		$sql="select distinct * from noticia where id_noticia in (SELECT id_noticia 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND `descripcion` LIKE  '%".$texto."%')";
				
				$sql .= " order by id_noticia DESC ";
			if($start!="" and $end != "")	
				$sql .= "LIMIT ".$start.",".$end;
				
		return $this->db->Execute($sql);
	}
	
	
	function getTotalArticulosByTag($id=""){
		$sql="SELECT count(*) total 
				FROM `noticia`
				WHERE estado = 1";
			if($id!="")	
				 $sql.=" and id_noticia in (select noticia from tags_noticias where tag = '".$id."')";
		$rs=$this->db->Execute($sql);
		if($rs->EOF)
			return 0; 
		return $rs->fields['total'];
	}
	
	function getArticulosByTag($id="",$start,$end){
		$sql="SELECT *
				FROM `noticia`
				WHERE estado = 1";
			if($id!="")	
				 $sql.=" and id_noticia in (select noticia from tags_noticias where tag = '".$id."')";
		$sql.=" LIMIT ".$start.",".$end;		 
		return $this->db->Execute($sql);		
	}
	function getArticulosByTagGroup($tag,$start,$end){
		
		$sql="SELECT *
				FROM `noticia`
				WHERE estado = 1";
			//if($id!="")	
				 $sql.=" and id_noticia in (select noticia from tags_noticias where tag in (".$tag."))";
		$sql.=" LIMIT ".$start.",".$end;		 
		return $this->db->Execute($sql);		
	}
	function getTotalArticulosByVideo(){
		$sql="SELECT count(*) total 
				FROM `noticia`
				WHERE estado = 1
				AND tipovideo = 1";
		$rs=$this->db->Execute($sql);
		if($rs->EOF)
			return 0; 
		return $rs->fields['total'];
	}
	function getArticulosByVideo($start,$end){
		$sql="SELECT *
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipovideo = 1
				order by id_noticia DESC LIMIT ".$start.",".$end;
		return $this->db->Execute($sql);		 
	}
	function getArticulosPopularByCategoria($id,$limit=""){
		$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1		
				AND tipo = 2
				AND `categoria` = ".$id."
				ORDER BY visitas DESC LIMIT 0,".$limit."";
		return $this->db->Execute($sql);
	}
	function getArticulosRecienteByCategoria($id,$limit=""){
		$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2				
				AND `categoria` = ".$id."
				ORDER BY fecha_publicacion DESC LIMIT 0,".$limit."";
		return $this->db->Execute($sql);
	}
	function getNoticiasDestacadoBySubcategoria($id,$limit=""){
	
				$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND destacado = 1				
				AND `categoria` = ".$id."
				ORDER BY fecha_publicacion DESC LIMIT 0,".$limit."";

		return $this->db->Execute($sql);
	}
	function getNoticiaById($id){
		$sql="select * from noticia,categorias_noticias where id_noticia= ".$id." and `id_noticia` = noticia";
		return $this->db->Execute($sql);
	}
	function getNoticiasDestacadoByCategoria($id,$limit=""){
	
				$sql="SELECT * 
FROM `noticia` , categorias_noticias, subcategoria
WHERE `id_noticia` = noticia
AND estado = 1
AND destacado = 1				
AND categorias_noticias.categoria = subcategoria.id
AND subcategoria.categoria = ".$id."
ORDER BY fecha_publicacion DESC LIMIT 0,".$limit."";

		return $this->db->Execute($sql);
	}
	function aumentaVisitaArticulo($id){
		$this->db->Execute("update noticia set visitas=visitas+1 where id_noticia=".$id);
	}
	function getArticuloDestacadoBySubcategoria($id,$limit=""){
	
				$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND destacado = 1				
				AND `categoria` = ".$id."
				ORDER BY fecha_publicacion DESC LIMIT 0,".$limit."";

		return $this->db->Execute($sql);
	}	
	function getTotalArticuloDestacadoByCategoria($id,$limit="",$tipo=1){
	
				$sql="SELECT count(*) TOTAL 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = ".$tipo."
				AND destacado = 1				
				AND `categoria` in (select id from subcategoria where categoria = ".$id.")";
		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getArticuloDestacadoByCategoria($id="",$limit="",$tipo=1){
	
				$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = ".$tipo."
				AND destacado = 1";				
				if($id!="")
					$sql.= " AND `categoria` in (select id from subcategoria where categoria = ".$id.")";
				
				$sql.= " ORDER BY fecha_publicacion DESC, rand() LIMIT 0,".$limit."";

		return $this->db->Execute($sql);
	}
	
	
	function getTotalArticuloByCategoria($id,$limit="",$tipo=1){
	
				$sql="SELECT count(*) TOTAL 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = ".$tipo."	
				AND `categoria` in (select id from subcategoria where categoria = ".$id.")";
		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getArticuloByCategoria($id,$start=0,$limit=10){
	
				$sql="SELECT distinct * from noticia where id_noticia in ( 
				select id_noticia FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1	
				AND `categoria` in (select id from subcategoria where categoria = ".$id."))
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	function getOrgenNoticia($id){
		$sql="select * from noticia_orden where noticia = ".$id;
		return $this->db->Execute($sql);
	}
	function getTotalArticuloBySubCategoria($id,$tipo=1){
	
				$sql="SELECT count(*) TOTAL from noticia where id_noticia in(select id_noticia FROM `noticia` , categorias_noticias WHERE `id_noticia` = noticia	AND estado = 1 AND `categoria` =".$id.")";
		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getArticuloBySubCategoria($id,$start=0,$limit=10,$tipo=1){
	
				$sql="SELECT * from noticia where id_noticia in (select id_noticia  
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = ".$tipo."			
				AND `categoria` =".$id.")
				ORDER BY fecha_publicacion DESC, rand() LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	function getArticuloBySubCategoriaSemana($id,$start=0,$limit=10,$tipo=1){
	
				$sql="SELECT * from noticia where id_noticia in (select id_noticia  
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1		
				AND `categoria` =".$id.")
				ORDER BY id_noticia ASC  LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	function getGaleriaByNoticia($id){
		$sql="select * from fotos_noticias where noticia=".$id;
		return $this->db->Execute($sql);
	}
	function getArticuloById($id){
		$sql="select * from noticia where id_noticia = ".$id;
		return $this->db->Execute($sql);
	}

	function getTotalPreguntasRespondidas(){
		$sql="select count(*) total from preguntas where respuesta != '' order by id DESC";
		$rs=$this->db->Execute($sql);
		return $rs->fields['total'];
	}
	function getPreguntasRespondidas($start=0,$limit=10){
		$sql="select * from preguntas where respuesta != '' order by id DESC LIMIT ".$start.",".$limit."";
		return $this->db->Execute($sql);
		
	}
	function insertPregunta($post){

			$sql="insert into preguntas values (''";
			$sql.=",'".$post['autor']."'";
			$sql.=",'".$post['pregunta']."','',0)";
			$this->db->execute($sql);

	}
	function getSideBar(){
		$sql="select * from barra_lateral order by orden ASC";
		return $this->db->Execute($sql);
	}
	
	function getNoticiasUltimoMinuto($limit=5){
	
				$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND ultimo_minuto = 1				
				ORDER BY fecha_publicacion DESC LIMIT 0,".$limit."";

		return $this->db->Execute($sql);
	}
	function getSlider($hoja){
		$sql="select * from slider where noticia <> 0 and hoja=".$hoja." order by orden ASC";
		return $this->db->Execute($sql);
	}
	function getTotalSliderPorHoja($hoja){
		$sql="select count(*) total from slider where noticia <> 0 and hoja=".$hoja;
		$rs=$this->db->Execute($sql);
		return $rs->fields['total'];
	}
	function getNoticiaDestacadoSoft($inicio,$fin){
		$sql="SELECT * 
				FROM `noticia` 
				WHERE estado = 1
				AND opinion = 1				
				ORDER BY fecha_publicacion DESC LIMIT ".$inicio.",".$fin."";

		return $this->db->Execute($sql);
	}
	function getTotalNoticiaTipoBlog(){
		$sql="SELECT count(*) as TOTAL 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND blog = 1";

		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getTotalNoticiaTipoCarta(){
		$sql="SELECT count(*) as TOTAL 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND carta = 1";

		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getNoticiaPorAutor($id){
		$sql="select * from noticia where autor = '".$id."' order by id_noticia DESC ";
		return $this->db->execute($sql);
	}
	function getNoticiaTipoBlog($start=0,$limit=10){
		$sql="SELECT * 
				FROM `noticia`
				WHERE estado = 1
				AND tipo = 2
				AND blog = 1				
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	function getNoticiaTipoCarta($start=0,$limit=10){
		$sql="SELECT * 
				FROM `noticia`
				WHERE estado = 1
				AND tipo = 2
				AND carta = 1				
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	function getAutores($id=""){
		$sql="select * from autores where 1 = 1";
		if($id!=""){
			$sql.=" and id=".$id;
		}
		return $this->db->Execute($sql);	
	} 
	function getTotalNoticiaTipoReportaje(){
		$sql="SELECT count(*) as TOTAL 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND reportaje = 1";

		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getNoticiaTipoReportaje($start=0,$limit=10){
		$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND reportaje = 1				
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";
		
		return $this->db->Execute($sql);
	}
	
	function getTotalNoticiaTipoGaleria(){
		
		$sql="SELECT count(*) as TOTAL  
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND galeria = 1";
		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getNoticiaTipoGaleria($start=0,$limit=10){
		
		$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND galeria = 1				
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	
	function getTotalNoticiaTipoVideo(){
		
		$sql="SELECT count(*) as TOTAL  
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND galeria = 1
				AND video != ''";
		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	
	function getNoticiaTipoVideo($start=0,$limit=10){
		
		$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND galeria = 1
				AND video != ''
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	function getNoticiaTipoViral($start=0,$limit=10){
		
		$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND viral = 1
				AND video != ''
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	
	
	function getTotalNoticiaTipoPanorama(){
		$sql="SELECT count(*) as TOTAL 
		FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND categoria = 100";

		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getNoticiaTipoPanorama($start=0,$limit=10){
		$sql="SELECT * 
				FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND categoria = 100				
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
	
	
	function getHumor(){
		$sql="select * from humor";
		return $this->db->execute($sql);
	}
	
	function getTotalEdiciones($edicion){
		
		$sql="SELECT count(*) total 
				FROM ediciones where edicion = '".$edicion."'";

		$rs=$this->db->Execute($sql);	
		return $rs->fields['total'];
		
	}
	function getEdiciones($edicion,$start=0,$fin=10){
		
		$sql="SELECT * 
				FROM ediciones where edicion = '".$edicion."' limit ".$start.",".$fin;

		return $this->db->Execute($sql);	
		
	}
	function getEdicionesById($edicion){
		
		$sql="SELECT * 
				FROM ediciones where id = '".$edicion."'";

		return $this->db->Execute($sql);	
		
	}
	
	function getEncuestasSeccion($id){
		$sql="select * from encuestas where ubicacion = ".$id;
		return $this->db->Execute($sql);	
	}
	function getEncuestas($id=""){
		$sql="select * from encuestas where 1 = 1";
		if($id!="" and $id != "n"){
			$sql.=" and id=".$id;
		}
		if($id=="n"){
			$sql.=" and 1=0";
		}
		return $this->db->Execute($sql);	
	}
	function totalrespondidas($id){
		$sql="select sum(seleccion) as total from encuesta_pregunta where encuesta=".$id;

		$rs=$this->db->Execute($sql);
		return $rs->fields['total'];
	}
	function getPreguntasEncuestas($id){
		$sql="select * from encuesta_pregunta where encuesta=".$id;
		

		return $this->db->Execute($sql);
	}
	function getPreguntasEncuestasIdentificador($id){
		$sql="select * from encuesta_pregunta where identificador=".$id;
		

		return $this->db->Execute($sql);
	}
	function insertRespuesta($get){
		
		$porciones = explode("_", $get['seleccionado']);
		for($i=0;$i<count($porciones);$i++){
			if($porciones[$i]!=""){
				$sql="update encuesta_pregunta set ";	
				$sql.="seleccion=seleccion+1";
				$sql.=" where identificador=".$porciones[$i];
				$this->db->Execute($sql);
			}
		}
		
	}
	function getPublicacionesEspeciales($id=""){
		$sql="select * from especiales where 1 = 1";
		if($id!=""){
			$sql.=" and id=".$id;
		}
		return $this->db->Execute($sql);	
	}
	
	function getTotalArticuloByEspecial($id){
		$sql="SELECT count(*) as TOTAL 
		FROM `noticia` , categorias_noticias
				WHERE `id_noticia` = noticia
				AND estado = 1
				AND tipo = 2
				AND especial = ".$id;

		$rs=$this->db->Execute($sql);
		return $rs->fields['TOTAL'];
	}
	function getArticuloByEspecial($id,$start=0,$limit=10){
		$sql="SELECT * 
				FROM `noticia`
				WHERE estado = 1
				AND tipo = 2
				AND especial = ".$id."				
				ORDER BY fecha_publicacion DESC LIMIT ".$start.",".$limit."";

		return $this->db->Execute($sql);
	}
    function executeCommand($sql)
    {

        return $this->db->Execute($sql);

    }
	function getPublicacionesSociales($id=""){
		$sql="select * from sociales where estado = 1";
		if($id!=""){
			$sql.=" and id=".$id;
		}
		$sql .=" order by id desc";
		return $this->db->Execute($sql);	
	}
	function getTotalPublicacionesSociales(){
		$sql="select count(*) total from sociales where estado = 1";
		
		$rs=$this->db->Execute($sql);	
		return $rs->fields['total'];
	}
	function getPublicacionesSocialesLimit($inicio=0,$termino=10){
		$sql="select * from sociales where estado = 1";
		
		$sql .=" order by id desc  limit $inicio,$termino";
		return $this->db->Execute($sql);	
	}
	function getFotosSociales($id){
	$sql="select * from fotos_sociales where noticia = ".$id;
		return $this->db->Execute($sql);
	}
	function getFotoLector($id=""){
		$sql="select * from fotolector where ubicacion = 1";
		if($id!=""){
			$sql.=" and id=".$id;
		}
		return $this->db->Execute($sql);	
	}
	function insertFotoLector($post,$foto){
		$sql="insert into fotolector values('',";
		$sql.="'".$post['nombre']."',";
		$sql.="".$post['ubicacion'].",";
		$sql.="'".$post['titulo']."',";
		$sql.="'".$foto."',";
		$sql.="'".$post['descripcion']."')";
		$this->db->Execute($sql);
		$rs = $this->db->Execute("select last_insert_id() as ID");
	}
    function close()
    {

        $this->db->close();
    }

	
	function closeConexion()
    {
        $this->db->close();
    }

}

?>