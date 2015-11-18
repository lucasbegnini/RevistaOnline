<?php

session_start();
$user = $_SESSION["user"];
$diretorio = $_POST["entrada"];
$autor = $_POST["autor"];
$editora = $_POST["editora"];
$_SESSION['titulo'] = $diretorio;
$_SESSION['path'] = "users/".$user."/".$diretorio;

if(is_dir($_SESSION['path']))
{
echo "A Pasta Existe";
}
else
{
	mkdir( $_SESSION['path']);
	mkdir($_SESSION['path']."/pages");
}

// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = $_SESSION['path'];
// Array com as extensões permitidas
$_UP['extensoes'] = array('rar', 'zip', 'cbr' , 'cbz');

// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
  echo "Por favor, envie arquivos com as seguintes extensões: rar, cbr ou cbz";
  exit;
}

  // Mantém o nome original do arquivo
  $nome_final = $_FILES['arquivo']['name'];
  
  
  //Pega a extensao do arquivo
$ext = pathinfo($nome_final, PATHINFO_EXTENSION);
	// Renomeia o tipo para o ideal
 if($ext == "cbz")
  {
	  $nome_final = preg_replace('"\.cbz$"', '.zip', $nome_final);
  }
  if($ext == "cbr")
  {
	   $nome_final = preg_replace('"\.cbr$"', '.rar', $nome_final);
  }
 
  $_SESSION['filename'] = $nome_final;
  
//Faz a busca de ID da editora e do autor, caso nao existam, criam!
$con = mysql_connect("127.0.0.1", "root", "") or die ("Sem conexão com o servidor");
$select = mysql_select_db("banca") or die("Sem acesso ao DB, Entre em contato com o Administrador");

$result = mysql_query("SELECT * FROM `autor` WHERE `nome` = '$autor'");


if(mysql_num_rows ($result) > 0 )
{
	 while($row = mysql_fetch_assoc($result)) {
	$_SESSION['idAutor'] = $row['idAutor'];
	 }
}else{
		mysql_query("INSERT INTO autor (nome) VALUES ('$autor')");	
		$result = mysql_query("SELECT * FROM `autor` WHERE `nome` = '$autor'");	
		while($row = mysql_fetch_assoc($result)) {
		$_SESSION['idAutor'] = $row['idAutor'];
		}		
}

$result = mysql_query("SELECT * FROM `editora` WHERE `nome` = '$editora'");


if(mysql_num_rows ($result) > 0 )
{
	 while($row = mysql_fetch_assoc($result)) {
	echo $_SESSION['idEditora'] = $row['idEditora'];
	 }
}else{
		mysql_query("INSERT INTO editora (nome) VALUES ('$editora')");	
		$result = mysql_query("SELECT * FROM `editora` WHERE `nome` = '$editora'");	
		while($row = mysql_fetch_assoc($result)) {
			echo $_SESSION['idEditora'] = $row['idEditora'];
		}		
}

  
  // Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']."/" . $nome_final)) {
  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
  echo "Upload efetuado com sucesso!";
  header("Location: extract.php");
} else {
  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
  echo "Não foi possível enviar o arquivo, tente novamente";
}



?>