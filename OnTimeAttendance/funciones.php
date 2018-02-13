<?php
function conectarBase($host,$usuario,$clave,$base){

	if (!$enlace = mysql_connect($host,$usuario,$clave,$base)){

		return false;

	} else {

		return $enlace;

	}

}


function consultar($conexion, $consulta){

	if (!$datos = mysqli_query($conexion, $consulta) or mysqli_num_rows($datos)<1){

		return false; // si fue rechazada la consulta por errores de sintaxis, o ningún registro coincide con lo buscado, devolvemos false

	} else {

		return $datos; // si se obtuvieron datos, los devolvemos al punto en que fue llamada la función

	}
}
?>
