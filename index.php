<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Soloäventyr</title>
	<link href="https://fonts.googleapis.com/css?family=Merriweather|Merriweather+Sans" rel="stylesheet">
	<!-- Min egna css <link rel="stylesheet" href="css/style.css"> -->
	<!-- BootStraps css -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


</head>
<body>
<!-- the navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Hem</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="play.php?page=1">Spela</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="edit.php">Redigera</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Main content -->
<main class="content">
	<div class="col-4">
		<h1>Soloäventyr - LONE SHEEP </h1>
		<p>Välkommen till mitt text äventyr Trappen, Undan Flykten från Träppen.</p>

		<img src="bilder/sheep.svg" alt="ensammaVargen" height="350" width="350">
		<p> Om du väljer att trycka på Spela så kommer du kunna spela mitt fantastiska
			 spel.</p>
	</div>
</main>
<script src="js/navbar.js"></script>
</body>
</html>
