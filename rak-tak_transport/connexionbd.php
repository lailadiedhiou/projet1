<?php
$host='localhost';
$users='root';
$password='';
$bd='transport';

$con=mysqli_connect($host,$users,$password,$bd);
if(!$con){
    echo "Erreur de connexion à la base de donnée transport";
}
?>