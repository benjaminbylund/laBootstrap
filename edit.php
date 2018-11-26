<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Soloäventyr - Redigera</title>
	<link href="https://fonts.googleapis.com/css?family=Merriweather|Merriweather+Sans" rel="stylesheet">
	<!-- BootStraps css -->
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 <!-- BootStrap Javascript -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- Min egna css <link rel="stylesheet" href="css/style.css"> --> 
</head>
<body>
<!-- the navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="" id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Hem</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="play.php?page=1">Spela</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="edit.php">Redigera</a>
      </li>
    </ul>
  </div>
</nav>
<!-- main content -->
<div class="container">
	<section>
		<h1>Redigera</h1>

	<!-- Form -->
	<nav class="navbar navbar-light bg-light">
	  <form action="edit.php" method="POST">
	  	TEXT:<br>
	    <textarea rows="4" cols="50" name="text"></textarea>
	    <br>BILD:<br>
	    <input type="text" name="bild" value="">
	    <br><br>
	    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>
	 	<button class="btn btn-outline-success ny-2 my-sm-0" type="submit">Update</button>
	  </form>
	</nav>
</div>

<?php
include_once 'include/dbinfo.php';
// PDO
$dbh = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', $dbuser, $dbpass);


if (isset($_POST['submit'])){
	$filteredText = filter_input(INPUT_POST, "text", FILTER_SANITIZE_EMAIL);
	$filteredPic = filter_input(INPUT_POST, "bild", FILTER_SANITIZE_SPECIAL_CHARS);
	$stmt = $dbh->prepare("INSERT INTO story (text, bild) VALUES (:text, :bild)");
	$stmt->bindparam(':text', $filteredText);
  $stmt->bindparam(':bild', $filteredPic);
	$stmt->execute();

var_dump($_POST);

}elseif(isset($_POST['update'])) {
	$filteredText = filter_input(INPUT_POST, "text", FILTER_SANITIZE_EMAIL);
	$filteredPic = filter_input(INPUT_POST, "bild", FILTER_SANITIZE_SPECIAL_CHARS);
	$stmt = $dbh->prepare("UPDATE story SET text= :text, bild= :bild WHERE 0");
	$stmt->bindparam(':text', $filteredText);
	$stmt->bindparam(':bild', $filteredPic);
	$stmt->execute();

}


$stmt = $dbh->prepare("SELECT * FROM story");
$stmt->execute();

$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";

foreach ($row as $value){
	echo "<tr>";
			echo 	"<td>" . $value['id'] . "</td>";
			echo "<td>" . substr($value['text'], 0, 40) . " </td>";
	echo "<td <a href=\"edit.php?edit=" . $value['id'] . "\">Edit</a> </td>";
	echo "</tr>";
}

echo "</table>";

?>
</main>
</body>
</html>
