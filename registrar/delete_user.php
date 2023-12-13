<?php
include('dbcon.php');

$id=$_GET['id'];

mysqli_query($connection,"delete from users where user_id='$id'") or die(mysqli_error($connection));

header('location:users.php');
?>