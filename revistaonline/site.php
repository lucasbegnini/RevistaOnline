
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comic Share - Menu</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
			<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Comic Share</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="http://localhost/revistaonline/">Home</a></li>
			<li><a href="#">Search</a></li>
			<li><a href="#">Profile</a></li>
			<li><a href="#">Help</a></li>
		</ul>
			</div>
		</div>
		</nav>
	
	<div id="main" class="container">	
		
		   <?php
			session_start();
			$host = "localhost";
			$usuario = "root";
			$senha = "";

			$banco = "banca";
	
			$idUser =$_SESSION['idUser'];
		
			?>
		<h2> Welcome, <?php echo $_SESSION['user']; ?> </h2>
			
			<form method="post" action="busca.php">
			<input type="text" name="busca" />
			<button type="submit" action="busca.php" class="btn btn-info btn-lg" aria-label="Left Align">
			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			</button>
			</form>
											
				
				<div class="row revista">

				<h3> Your Magazines </h3>
           <!-- conteudo principal -->
				<?php

			//abrindo a conexao com o banco
			$conexao = mysql_connect($host, $usuario, $senha);
			mysql_select_db($banco, $conexao);

			//criando a query e mandando pro banco
			$query = "SELECT * FROM `revista`  WHERE `idUser` = '$idUser' ";
			$query = mysql_query($query, $conexao);

			while($dados = mysql_fetch_array($query))
			{
			?>
	
				<div class="col-md-4">
				<A  HREF="http://localhost/revistaonline/<?php echo $dados['url'] ?>/"> <IMG class="img-responsive" SRC="http://localhost/revistaonline/<?php echo $dados['url'] ?>/pages/1.jpg"> <?php echo $dados['titulo'] ?> </A>
				</div>
				<?php
			}
			?>
		   
				</div>
			
			
			<form method="post" action="uploadmagazine.php">
			<button type="submit" class="btn btn-info btn-lg" aria-label="Left Align">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
			</form>
	

		
	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>