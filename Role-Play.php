<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="Role-Play.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="css\lightbox.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title>Role-Play</title>
</head>
<body>
<style>
body{
    font-family: Palatino, URW Palladio L, serif;
	background-color: DarkGray;
}

</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" style="font-size:2rem;" href="index.html"><strong>PengFox Games</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
	  <!-- 1 Genre Drop Down -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Genre
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Action.php">Action</a>
          <a class="dropdown-item" href="Role-Play.php">Role-Play</a>
          <a class="dropdown-item" href="Strategy.php">Strategy</a>
		  <a class="dropdown-item" href="Adventure.php">Adventure</a>
		  <a class="dropdown-item" href="Survival.php">Survival</a>
		  <a class="dropdown-item" href="Simulation.php">Simulation</a>
		  <a class="dropdown-item" href="Sports.php">Sports & Racing</a>
        </div>
      </li> 
	  <!-- 2 Theme Drop Down -->
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Theme
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="OpenWorld.php">Open World</a>
          <a class="dropdown-item" href="Shooter.php">Shooter</a>
		  <a class="dropdown-item" href="Horror.php">Horror</a>
		  <a class="dropdown-item" href="Sci-Fi.php">Sci-Fi</a>
		  <a class="dropdown-item" href="Mystery.php">Mystery & Detective</a>
        </div>
      </li>
	  <!-- 3 Player Support -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Player Support
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Singleplayer.php">Singleplayer</a>
          <a class="dropdown-item" href="Multiplayer.php">Multiplayer</a>
          <a class="dropdown-item" href="COOP.php">CO-OP</a>
        </div>
      </li>
	  <!-- 3 End -->
      <li class="nav-item">
        <a class="nav-link disabled" href="#" hidden>Disabled</a>
      </li>
    </ul>
  </div>
  <!-- OTSING ALGUS-->
  <form class="form-inline my-2 my-lg-0" method="get" action="">
      <input class="form-control mr-sm-2" type="search" name="otsi" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="otsi" >Search</button>
  </form>
  <!-- OTSING LOPP-->
</nav>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1>ROLE-PLAY</h1>
	</div>
</div>
<?php
$server = 'localhost';
$dbuser = 'root';
$dbpass = 'Reverse5';
$db = 'mangupood';
$yhendus = mysqli_connect($server, $dbuser, $dbpass, $db);
if (!$yhendus) {
 die('probleem andmebaasiga');
}
//uudiseid ühel lehel
$mange_lehel = 5;
//lehtede arvutamine
$mange_kokku_paring = "SELECT COUNT('id') FROM mangud";
$lehtede_vastus = mysqli_query($yhendus, $mange_kokku_paring);
$mange_kokku = mysqli_fetch_array($lehtede_vastus);
$lehti_kokku = $mange_kokku[0];
$lehti_kokku = ceil($lehti_kokku/$mange_lehel);
//kasutaja valik
if (isset($_GET['page'])) {
 $leht = $_GET['page'];
} else {
 $leht = 1;
}
//millest näitamist alustatakse
$start = ($leht-1)*$mange_lehel;
//andmebaasist andmed
$paring = "SELECT * FROM mangud WHERE zanr='Role-play' LIMIT $start, $mange_lehel";
$vastus = mysqli_query($yhendus, $paring);
//väljastamine
while ($rida = mysqli_fetch_assoc($vastus)){
 //var_dump($rida);?>
 <div class="row" id="rida">
 <div class="col-sm-3" style="margin-left: 10rem; padding-bottom: 2rem;">
 <a href="index.html">
 <img style="width: 500px; lenght: 500px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rida['pilt']); ?>"/>
 </a>
 </div>
 <div class="col-sm-2" style="color: black;">
 <a href="index.html" style="text-color: black;">
 <?php
  echo '<br>';
 echo '<h3>'.$rida['nimi'].'</h3>';
 ?>
 </a>
 <?php
 echo '<h6 style="margin-left: 1rem;"> Tags: '.$rida['zanr'].', '.$rida['teema'].', '.$rida['tugi'].'</h6>';
 echo '<h4 style="margin-left: 1rem;">'.$rida['hind'].' €</h4>';
 ?>
 <a href="https://www.youtube.com/watch?v=YddwkMJG1Jo&ab_channel=Rickroll%2Cbutwithadifferentlink">
 <button style ="margin-left: 1rem;" class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="otsi" >Buy</button>
 </a>
 <?php
 echo '<br>';
 ?>
 </div>
 </div>
 <?php
}
//kuvame lingid
$eelmine = $leht - 1;
$jargmine = $leht + 1;
?>
<div class="container" style="margin-right: 42rem; text-color: black;">
<?php
if ($leht>1) {
 echo "<a href=\"?page=$eelmine\">Eelmine</a> ";
}
if ($lehti_kokku >= 1) {
 for ($i=1; $i<=$lehti_kokku ; $i++) { 
 if ($i==$leht) {
 echo "<b><a href=\"?page=$i\">$i</a></b> ";
 } else {
 echo "<a href=\"?page=$i\">$i</a> ";
 }
 
 }
}
if ($leht<$lehti_kokku) {
echo "<a href=\"?page=$jargmine\">Järgmine</a> ";
}
?>
</div>
<footer>
<br>
	<div class="row">
		<div class="col-sm-4">
			PengFox
			<br>
			<a href="">About Us</a>
			<br>
			<a href="">Policy Terms & Conditions</a>
			<br>
			<a href="">Blog</a>
		</div>
		<div class="col-sm-4">
			My Account
			<br>
			<a href="">My Account</a>
			<br>
			<a href="">My Orders</a>
			<br>
			<a href="">Affiliate Account</a>
		</div>
		<div class="col-sm-4">
			Contact us
			<br>
			<a href="">Customer Service</a>
			<br>
			<a href="">Phone: +372 54322713</a>
			<br>
			<a href="mailto:karmo.ots2@gmail.com">Email: karmo.ots2@gmail.com</a>
		</div>
	</div>
<br>
	<p id="copy">Copyright PengFox.com 2021, all rights reserved</p>
</footer>
<script src="js\lightbox.js"></script>
</body>
</html>