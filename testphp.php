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
$paring = "SELECT * FROM mangud WHERE zanr='Action' LIMIT $start, $mange_lehel";
$vastus = mysqli_query($yhendus, $paring);
//väljastamine
while ($rida = mysqli_fetch_assoc($vastus)){
 //var_dump($rida);
 echo '<h3>'.$rida['nimi'].'</h3>';
 echo '<p>'.$rida['hind'].'</p>';
}
//kuvame lingid
$eelmine = $leht - 1;
$jargmine = $leht + 1;
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