<?php

session_start();

$login = $_POST['login'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$con = mysql_connect("127.0.0.1", "root", "") or die ("Sem conexão com o servidor");

$select = mysql_select_db("banca") or die("Sem acesso ao DB, Entre em contato com o Administrador");

$result = mysql_query("SELECT * FROM `user` WHERE `email` = '$email'");

if(mysql_num_rows ($result) > 0 )

{
	echo "Email já cadastrado!";
	?>
	<form method="post" action="../index.php">
	<input type="submit" value="Menu"  />
	</form>
	<?php
}else
{
	mysql_query("INSERT INTO user (nome, email, senha) VALUES ('$login', '$email', '$senha')");
	mkdir("../users/".$login);
	header('location:../site.php');
	
}

mysql_close($con);
?>