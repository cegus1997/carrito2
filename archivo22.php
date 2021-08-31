<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php
	include 'config.inc.php';
	     $db = new Conect_MySql();
            $sql = "select*from tbl_texto where id_documento=".$_GET['id'];
            $query = $db->execute($sql);
           if($datos=$db->fetch_row($query)) {
  				if($datos['nombre_archivo']==""){?>
  			<p> No tiene archivos </p>
  				<?php } else{ 
  			header('content-type: application/pdf');
  			readfile('archivos/'.$datos['nombre_archivo']);

	 } 
	} 
?>

</body>
</html>