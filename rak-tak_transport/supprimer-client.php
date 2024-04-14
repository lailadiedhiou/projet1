<?php
include_once "connexionbd.php";

$id=$_GET['id'];
$req=mysqli_query($con, "DELETE FROM clients WHERE id_client = $id");
header("location:liste-client.php")
?>;