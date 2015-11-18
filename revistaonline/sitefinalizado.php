
<?php
	session_start();
	echo $_SESSION['user']; 
 ?>
<form method="post" action="fazerbusca.php">
<input type="submit" value="Buscar"  />
</form>

<form method="post" action="minhasrevistas.php">
<input type="submit" value="Minhas revistas"  />
</form>

<form method="post" action="indexupload.php">
<input type="submit" value="Upload de Revista"  />
</form>

<form method="post" action="index.php">
<input type="submit" value="Sair"  />
</form>