<?php

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$con = mysql_connect("127.0.0.1", "root", "") or die ("Sem conexão com o servidor");

$select = mysql_select_db("banca") or die("Sem acesso ao DB, Entre em contato com o Administrador");

$result = mysql_query("SELECT * FROM `user` WHERE `email` = '$login' AND `senha`= '$senha'");

if(mysql_num_rows ($result) > 0 )

{
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	 while($row = mysql_fetch_assoc($result)) {
	
	$_SESSION['user'] = $row['nome'];
	$_SESSION['idUser'] = $row['idUser'];
	 }

	header('location:../site.php');
}else
{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:../index.html');
	
}
mysql_close($con);
?>

