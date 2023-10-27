<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$NombreT = $_POST['nombreT'];
	$PrecioI = $_POST['precioI'];
	$Provedor = $_POST['provedor'];
	$TipoP = $_POST['tipoP'];
	$CantidadP = $_POST['cantidadP'];
	$FechaE = $_POST['fechaE'];
	$FormaP = $_SESSION['formaP'];
	
	// checking empty fields
	if(empty($NombreT) || empty($PrecioI) || empty($Provedor) || empty($TipoP) || empty($CantidadP) || empty($FechaE) || empty($FormaP)) {
				
		if(empty($NombreT)) {
			echo "<font color='red'>llena el campo nombre.</font><br/>";
		}
		
		if(empty($PrecioI)) {
			echo "<font color='red'>llena el campo tipo.</font><br/>";
		}
		
		if(empty($Provedor)) {
			echo "<font color='red'>llena el campo acabado.</font><br/>";
		}	

		if(empty($TipoP)) {
			echo "<font color='red'>llena el campo distribuidor.</font><br/>";
		}	

		if(empty($CantidadP)) {
			echo "<font color='red'>llena el campo precio.</font><br/>";
		}	

		if(empty($FechaE)) {
			echo "<font color='red'>llena el campo medidas.</font><br/>";
		}	

		if(empty($FormaP)) {
			echo "<font color='red'>llena el campo ancho.</font><br/>";
		}	
	} else {	
		//updating the table
	    $result = mysqli_query($mysqli, "UPDATE tbl_inventario SET nombre='$NombreT', tipo='$PrecioI', acabado='$Provedor', distribuidor='$TipoP', precio='$CantidadP', medidas='$FechaE', ancho='$FormaP' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tbl_inventario WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$NombreT = $_POST['nombreT'];
	$PrecioI = $_POST['precioI'];
	$Provedor = $_POST['provedor'];
	$TipoP = $_POST['tipoP'];
	$CantidadP = $_POST['cantidadP'];
	$FechaE = $_POST['fechaE'];
	$FormaP = $_SESSION['formaP'];
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="view.php">Ver productos</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nombre Trabajador</td>
				<td><input type="text" name="nombreT" value="<?php echo $NombreT;?>"></td>
			</tr>
			<tr> 
				<td>Precio Ingredientes</td>
				<td><input type="text" name="precioI" value="<?php echo $PrecioI;?>"></td>
			</tr>
			<tr> 
				<td>Provedor</td>
				<td><input type="text" name="provedor" value="<?php echo $Provedor;?>"></td>
			</tr>
			<tr> 
				<td>Tipo Productos</td>
				<td><input type="text" name="tipoP" value="<?php echo $TipoP;?>"></td>
			</tr>
			<tr> 
				<td>Cantidad Productos</td>
				<td><input type="text" name="cantidadP" value="<?php echo $CantidadP;?>"></td>
			</tr>
			<tr> 
				<td>Fecha Entrega</td>
				<td><input type="text" name="fechaE" value="<?php echo $FechaE;?>"></td>
			</tr>
			<tr> 
				<td>Forma Pago</td>
				<td><input type="text" name="formaP" value="<?php echo $FormaP;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
