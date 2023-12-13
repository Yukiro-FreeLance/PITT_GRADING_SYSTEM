<?php
include('dbcon.php');
$id=$_GET['id'];
mysqli_query($connection,"delete from subject where subject_id='$id'")or die(mysqli_error($connection));
header('location:subject.php');
?>