<?php
$busca = $_POST['busca'];
$host = "localhost";
$usuario = "root";
$senha = "";

$banco = "banca";

$idautor = $ideditora = "null";

//abrindo a conexao com o banco
$conexao = mysql_connect($host, $usuario, $senha);
mysql_select_db($banco, $conexao);

//verifica se há algum autor com o nome da busca
$query = "SELECT * FROM `autor`  WHERE `nome` = '$busca' ";
$query = mysql_query($query, $conexao);

if(mysql_num_rows ($query) > 0 )
{
	while($row = mysql_fetch_array($query))
	{
	$idautor = $row['idAutor'];
	}
	
}

//verifica se há alguma editora com o nome da busca
$query = "SELECT * FROM `editora`  WHERE `nome` = '$busca' ";
$query = mysql_query($query, $conexao);

if(mysql_num_rows ($query) > 0 )
{
	while($row = mysql_fetch_array($query))
	{
	$ideditora = $row['idEditora'];
	}
}

//Faz a busca no banco da revista
$query = "SELECT * FROM `revista`  WHERE `titulo` = '$busca' OR 'idAutor' = '$idautor' OR 'idEditora' = '$ideditora'";
$query = mysql_query($query, $conexao);

if(mysql_num_rows ($query) > 0 )
{
	while($dados = mysql_fetch_array($query))
	{
	?>
	
	<A HREF="http://localhost/revistaonline/<?php echo $dados['url'] ?>/"> <IMG SRC="http://localhost/revistaonline/<?php echo $dados['url'] ?>/pages/1.jpg"> <?php echo $dados['titulo'] ?> </A>
	
	<?php
	}
}else{
	echo "Sua busca nao retornou nada!";
}


?>