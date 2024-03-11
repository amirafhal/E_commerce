<?php

$id = $_GET['ID'];
$conn = mysqli_connect('localhost','root','','Stage');
mysqli_query($conn,"DELETE FROM users WHERE id = $id");
header("location:user.php");




?>