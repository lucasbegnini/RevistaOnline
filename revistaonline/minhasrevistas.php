<?php
session_start();
$host = "localhost";
$usuario = "root";
$senha = "";

$banco = "banca";

$idUser =$_SESSION['idUser'];

//abrindo a conexao com o banco
$conexao = mysql_connect($host, $usuario, $senha);
mysql_select_db($banco, $conexao);

//criando a query e mandando pro banco
$query = "SELECT * FROM `revista`  WHERE `idUser` = '$idUser' ";
$query = mysql_query($query, $conexao);

while($dados = mysql_fetch_array($query))
{
	?>
	
	<div class="col-md-6">
	<A class="img-responsive" HREF="http://localhost/revistaonline/<?php echo $dados['url'] ?>/"> <IMG SRC="http://localhost/revistaonline/<?php echo $dados['url'] ?>/pages/1.jpg"> <?php echo $dados['titulo'] ?> </A>
	</div>
	<?php
}
?>