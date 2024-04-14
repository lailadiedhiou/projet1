<?php
include_once "connexionbd.php";

$id=$_GET['id'];
$req=mysqli_query($con, "DELETE FROM reservations WHERE num_reservation = $id");
header("location:reservation.php")
?>;