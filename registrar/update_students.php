<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
$id=$_POST['id'];
$student_id=$_POST['id'];
$student_no=$_POST['student_no'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$course=$_POST['course'];
$term=$_POST['term'];

$password=$_POST['password'];
$year_level = $_POST['year_level'];
$status = $_POST['status'];

mysqli_query($connection,"update students set student_no='$student_no',firstname='$firstname',lastname='$lastname',password='$password',year_level = '$year_level',course = '$course' , term = '$term' , student_status = '$status' where student_id='$id'")or die(mysqli_error($connection));
								
								
header('location:students.php');
}
?>	