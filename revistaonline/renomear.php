<?php
session_start();

 echo $destino = $_SESSION['path'];
 $id = "1";


$images = glob($destino.'/*.jpg');
//renomeia e move para dentro da pasta pages
foreach($images as $image)
{
	rename($image,$destino."/pages/".$id.".jpg");
	$id = $id + 1;
	//echo $image =  pathinfo($destino."/".$image, PATHINFO_FILENAME);
}
$_SESSION['size'] = $id;

// header("Location: gerarindex.php");
?>
<form method="post" action="gerarindex.php">
<input type="submit" value="GerarIndex"  />
</form>