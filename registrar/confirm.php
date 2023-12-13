<?php
include('dbcon.php');
$get_id = $_GET['id'];

mysqli_query($connection,"update students set status = 'active ' where student_id  = '$get_id' ")or die(mysqli_error($connection));
header('location:unstudents.php');
?>