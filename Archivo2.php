<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
	crossorigin="anonymous">
	<title></title>
</head>
<body>
	<table class="table table-dark">
		<tr>
			<td>titulo</td>
			<td>descripcion</td>
			<td>tamaño</td>
			<td>tipo</td>
			<td>nombre</td>
		</tr>
	<?php
	include 'config.inc.php';
	     $db = new Conect_MySql();
            $sql = "select*from tbl_texto";
            $query = $db->execute($sql);
           while ($datos=$db->fetch_row($query)) {?>
<tr>
	<td><?php echo $datos['titulo'];?></td>
	<td><?php echo $datos['descripcion'];?></td>
	<td><?php echo $datos['tamanio'];?></td>
	<td><?php echo $datos['tipo'];?></td>
	<td><a href="archivo22.php?id=<?php echo $datos['id_documento']?>"><?php echo $datos['nombre_archivo'];?></a></td>
           	
</tr>     

	<?php } ?>


</table>
</body>
</html>