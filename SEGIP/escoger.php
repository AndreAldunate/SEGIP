<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Deshabilitación SEGIP</title>

<style>
.body {
	position: fixed;
	overflow-y: scroll;
	width: 100%;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(http://www.boliviaentusmanos.com/noticias/images/segip1825030215.jpg);
	background-size: cover;
	-webkit-filter: blur(0px);
}

form {
  display: block;
  margin: 30px;
  overflow: hidden;
  background: #fff;
  border: 1px solid #e4e4e4;
  border-radius: 5px;
  font-size: 0;
}
 
form > div > label {
  display: block;
  padding: 20px 20px 10px;
  vertical-align: top;
  font-size: 13px;
  font-weight: bold;
  text-transform: uppercase;
  color: #939393;
  cursor: pointer;
}
form > div.switch > label {
  padding: 16px 20px 13px;
}
 
.col-2, .col-3, .col-4 { 
  border-bottom: 1px solid #e4e4e4;
}
 
form > div > .col-4 {
  height: 86px;
}
 
label > input {
  display: inline-block;
  position: relative;
  width: 100%;
  height: 27px;
  line-height: 27px;
  margin: 5px -5px 0;
  padding: 7px 5px 3px;
  border: none;
  outline: none;
  color: #555;
  font-family: 'Helvetica Neue', Arial, sans-serif;
  font-weight: bold;
  font-size: 14px;
  opacity: .6;
  transition: all linear .3s;
}
 
.col-submit {
  text-align: center;
  padding: 20px;
}
 
label > select {
  display: block;
  width: 100%;
  padding: 0;
  color: #555;
  margin: 16px 0 6px;
  font-weight: 500;
  background: transparent;
  border: none;
  outline: none;
  font-family: 'Helvetica Neue', Arial, sans-serif;
  font-size: 14px;
  opacity: .4;
  transition: all linear .3s;
}
 
label > input:focus, label > select:focus {
  opacity: 1;
}
</style>
</head>
<body>
<form name ="deshabilitar" method ="post">
  <div class="col-1">
    <label>
      Número de CI
      <input type="text" placeholder="Insertar ID" name="id" tabindex="1">
    </label>
  </div>
  <div class="col-submit">
    <input type="submit" name="submit"/>
  </div>
  <div class="col-submit">
    <a href="login.php"><input type="button" value="Cerrar Sesión"></a>
  </div>
</form>

	<?php	
		$db_name = "segip";
		$db_user = "segip";
		$db_pass = "seg1p";
		// Abrir la conexión a la base
		$dblink = new mysqli('localhost', $db_user, $db_pass, $db_name);
	
		$id = $_POST['id'];
		
		$sql = "select * from clientes where ci = $id;";
		$result = $dblink->query($sql);
		$mostrar = $result->fetch_object();
		$foto = $mostrar->foto;
		$ci = $mostrar->ci;
		$nombre = $mostrar->nombre;
		$profesion = $mostrar->profesion;
		$fecha = $mostrar->fecha_de_nacimiento;
		$estado = $mostrar->estado_civil;
		$direccion = $mostrar->direccion;
		$habilitado = $mostrar->habilitado;
		
		echo '<img src = "uploads/' . $foto . '" width="400px" height="400px" />';
		echo '<br>';
		echo 'CI: ' . $ci;
		echo '<br>';
		echo 'Nombre: ' . $nombre;
		echo '<br>';
		echo 'Profesion: ' . $profesion;
		echo '<br>';
		echo 'Fecha de nacimiento: ' . $fecha;
		echo '<br>';
		echo 'Estado civil: ' . $estado;
		echo '<br>';
		echo 'Direccion: ' . $direccion;
		echo '<br>';
		echo 'Habilitado: ' . $habilitado;
		
		//Cerrar la conexion
		$base_link->close();
	?>
	
</body>
</html>