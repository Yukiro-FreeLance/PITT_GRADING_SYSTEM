<?php
include('dbcon.php');
$id=$_GET['id'];
mysqli_query($connection,"delete from students where student_id='$id'") or die(mysqli_error($connection));
header('location:students.php');
?>