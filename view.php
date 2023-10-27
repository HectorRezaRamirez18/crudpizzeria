<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM tbl_inventario WHERE id_login=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">Agregar nuevo dato</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Nombre Trabajador</td>
			<td>Precio Ingredientes</td>
			<td>Provedor</td>
			<td>Tipo Productos</td>
			<td>Cantidad Productos</td>
			<td>Fecha Entrega</td>
			<td>Forma Pago</td>
			<td>Actualizar</td>
		</tr>
		<?php
while($res = mysqli_fetch_array($result)) {		
	echo "<tr>";
	echo "<td>".$res['nombreT']."</td>";
	echo "<td>".$res['precioI']."</td>";
	echo "<td>".$res['provedor']."</td>";	
	echo "<td>".$res['tipoP']."</td>";
	echo "<td>".$res['cantidadP']."</td>";
	echo "<td>".$res['fechaE']."</td>";
	echo "<td>".$res['formaP']."</td>";
	echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Seguro que quiere borrar el registro?')\">Borrar</a></td>";		
}
		?>
	</table>	
</body>
</html>
