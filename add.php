<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$NombreT = $_POST['nombreT'];
	$PrecioI = $_POST['precioI'];
	$Provedor = $_POST['provedor'];
	$TipoP = $_POST['tipoP'];
	$CantidadP = $_POST['cantidadP'];
	$FechaE = $_POST['fechaE'];
	$FormaP = $_POST['formaP'];
    $loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($NombreT) || empty($PrecioI) || empty($Provedor) || empty($TipoP) || empty($CantidadP) || empty($FechaE) || empty($FormaP)) {
				
		if(empty($NombreT)) {
			echo "<font color='red'>completa el campo Nombre Trabajador.</font><br/>";
		}
		
		if(empty($PrecioI)) {
			echo "<font color='red'>completa el campo Precio Ingredientes.</font><br/>";
		}
		
		if(empty($Provedor)) {
			echo "<font color='red'>completa el campo Provedor.</font><br/>";
		}

		if(empty($TipoP)) {
			echo "<font color='red'>completa el campo Tipo Productos.</font><br/>";
		}
		if(empty($CantidadP)) {
			echo "<font color='red'>completa el campo Cantidad Productos.</font><br/>";
		}
		if(empty($FechaE)) {
			echo "<font color='red'>completa el campo Fecha Entrega.</font><br/>";
		}
		if(empty($FormaP)) {
			echo "<font color='red'>completa el campo Forma Pago.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO tbl_inventario(NomTrabajador,PrecioIngredientes,Provedor,TipoProductos,CantidadProductos,FechaEntrega, FormaPago, id_login) VALUES('$NombreT','$PrecioI','$Provedor','$TipoP','$CantidadP','$FechaE','$FormaP','$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='view.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
