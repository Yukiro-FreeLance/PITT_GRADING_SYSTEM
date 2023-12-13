<?php
include('dbcon.php');
$id=$_GET['id'];
mysqli_query($connection,"delete from course where course_id='$id'")or die(mysqli_error($connection));
header('location:course.php');
?>