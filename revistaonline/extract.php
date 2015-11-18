<?php
session_start();
$filename = $_SESSION['filename'];
 $destino = $_SESSION['path'];
 
 $ext = pathinfo($destino."/".$filename, PATHINFO_EXTENSION);
//Extrair arquivos do tipo zip ou cbz
if($ext == "zip")  
{
 if(isset($destino)){
 $zip = new ZipArchive;
 echo $destino."/".$filename;
	if ($zip->open($destino."/".$filename) === TRUE)
	{
		$zip->extractTo($destino."/");
		$zip->close();
		echo 'ok';
		
		// header("Location: renomear.php");
	} else
	{
		 echo 'failed';
	}
 }
 unlink($destino."/".$filename);
}

//Extrair arquivos do tipo rar ou cbr
if($ext == "rar") 
{
	
}	
?>
<form method="post" action="renomear.php">
<input type="submit" value="Renomear"  />
</form>
