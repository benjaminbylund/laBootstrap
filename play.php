<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Soloäventyr - Spela</title>
	<link href="https://fonts.googleapis.com/css?family=Merriweather%7cMerriweather+Sans" rel="stylesheet">
	<!-- Min egna css <link rel="stylesheet" href="css/style.css"> -->
	<!-- BootStraps css -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 <!-- BootStrap Javascript -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<!-- the navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Hem</a>
      </li>
      <li class="nav-item active">
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
		<h1>Spela</h1>

<?php
	include_once 'include/dbinfo.php';
	// PDO
	$dbh = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', $dbuser, $dbpass);

	if (isset($_GET['page'])) {
		// TODO load requested page from DB using GET
		$filteredPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
		$stmt = $dbh->prepare("SELECT * FROM story WHERE id = :id");
		$stmt->bindParam(':id', $filteredPage);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//echo "<pre>" . print_r($row,1) . "</pre>";
		echo "<p>" . $row['text'] . "</p>";



		// echo "<p>" . $row['text'] . "</p>";
		$stmt = $dbh->prepare("SELECT * FROM storylinks WHERE storyid = :id");
		$stmt->bindParam(':id', $filteredPage);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($row as $val) {
			echo "<br>";
			echo "<a href=\"?page=" . $val['target'] . "\">" . $val['text'] . "</a>";
		}
	} elseif(isset($_SESSION['page'])) {
		// TODO load page from db
		// use for returning player / cookie
	} else {
		// TODO load start of story from DB
	}
?>
</main>
<script src="js/navbar.js"></script>
</body>
</html>
