<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Comic Share</title>

 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
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
			<li><a href="">Search</a></li>
			<li><a href="http://localhost/revistaonline/site.php">Profile</a></li>
			<li><a href="#">Help</a></li>
		</ul>
		</div>
	</div>
	</nav>
 
	<div id="main" class="container-fluid">	
		<form method="post" action="upload.php" enctype="multipart/form-data">
		<fieldset id="fie">

		<legend>LOGIN</legend><br />
		<label>Arquivo : </label>
		<input type="file" name="arquivo" />
		<label>Titulo : </label>
		<input type="text" name="entrada" /><br />
		<label>Autor : </label>
		<input type="text" name="autor" /><br />
		<label>Editora : </label>
		<input type="text" name="editora" /><br />


		<input type="submit" value="UPLOAD"  />
	</fieldset>
	</form>

	</div>
	
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>