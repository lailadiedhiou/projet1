<?php
include_once "connexionbd.php";

$id=$_GET['id'];
$req=mysqli_query($con, "DELETE FROM chaufeur WHERE id_chauffeur = $id");
header("location:liste-chauffeur.php")
?>;