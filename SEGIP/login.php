<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Login</title>

<style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);

@import
	url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

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

.header {
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
}

.header div {
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 42px;
	font-weight: 700;
}

.header div span {
	color: #F29E20 !important;
}

.login {
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
}

.login input[type=text] {
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255, 255, 255, 0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password] {
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255, 255, 255, 0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button] {
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover {
	opacity: 0.8;
}

.login input[type=button]:active {
	opacity: 0.6;
}

.login input[type=text]:focus {
	outline: none;
	border: 1px solid rgba(255, 255, 255, 0.9);
}

.login input[type=password]:focus {
	outline: none;
	border: 1px solid rgba(255, 255, 255, 0.9);
}

.login input[type=button]:focus {
	outline: none;
}

::-webkit-input-placeholder {
	color: rgba(255, 255, 255, 0.6);
}

::-moz-input-placeholder {
	color: rgba(255, 255, 255, 0.6);
}
</style>



</head>

<body oncontextmenu="return false">

	<div class="body"></div>
	<div class="grad"></div>
	<div class="header">
		<div>
			Team<span>SEGIP</span>
		</div>
	</div>
	<br>
	<form name="login" method="POST">
		<div class="login">
			<input type="text" placeholder="User" name="userid"><br>
			<input type="password" placeholder="Password" name="pswrd"><br>
			<input type="submit" name="submit"/>
		</div>
	</form>
	
	<?php	
		$db_name = "segip";
		$db_user = "segip";
		$db_pass = "seg1p";
		// Abrir la conexión a la base
		$dblink = new mysqli('localhost', $db_user, $db_pass, $db_name);
	
		
		$user = $_POST['userid'];
		$pass = $_POST['pswrd'];
		
		$sql = "select count(nombre) as res from empleados where nombre = '$user' and id_emp = '$pass' 	;";
		
		$result = $dblink->query($sql);
		$helper = $result->fetch_object()->res;
		
		if($helper == 1) {
			header('Location: opciones.php');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Usuario o clave erronea")';
			echo '</script>';
		}
		
		//Cerrar la conexion
		$base_link->close();
	?>

</body>
</html>