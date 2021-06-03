<?php
$db_server =  'projekt.ots.ee';
$db_andmebaas = 'muusikapood';
$db_kasutaja = 'root';
$db_salasona = 'Reverse5';

$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);
if(!$yhendus){
	die('Ei saa ühendust andmebaasiga');
}	
?>