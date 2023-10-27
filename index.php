<?php session_start(); ?>
<html>
<head>
	<title>Pagina principal</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		BIENVENIDO A  PIZZERIA REZA
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>cerrar sesion</a><br/>
		<br/>
		<a href='view.php'>Ver y Editar Productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar dado de alta para acceder a la pagina.<br/><br/>";
		echo "<a href='login.php'>Iniciar secion</a> | <a href='register.php'>Registrar</a>";
	}
	?>
	<div id="footer">
		<!--Created by <a href="http://blog.chapagain.com.np" title="Mukesh Chapagain">Mukesh Chapagain</a>-->
	</div>
</body>
</html>
