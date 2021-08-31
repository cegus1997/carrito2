<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivos/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $titulo = $_POST['titulo'];
            $descri = $_POST['descripcion'];
            $db = new Conect_MySql();
            $sql = "INSERT INTO tbl_texto(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";
            $query = $db->execute($sql);
            if ($query) {
                echo "Se guardo correctamente";
            }
        } else {
            echo "Error";
        }
    }
}
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
	crossorigin="anonymous">
	<title>Ingreso de Archivos</title>
</head>
<body>
	<form class="form-inline" method="post" action="" enctype="multipart/form-data">
		<div class="form-group">
		<table >
			<tr>
				<td><label>Titulo</label></td>
				<td><input type="text" name="titulo"></td>
			</tr>
			<tr>
				<td><label>Descripcion</label></td>
				<td><textarea name="descripcion"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><br><input class="form-control-file" type="file" name="archivo"></td>
				<tr><br>
					<td><input type="submit" class="btn btn-outline-primary" value="subir" name="subir"></td>
					<td><br><a href="Archivo2.php"> lista</a></td>
				</tr>
			</table>
		</div>
	</form>

</body>
</html>