<?php
 include('dbcon.php');

 if (isset($_POST['delete'])){
$id = $_POST['id'];
$get_id = $_POST['get'];


 mysqli_query($connection,"delete from grade where grade_id='$id'") or die(mysqli_error($connection)); 
?>
<script>
  window.location = "view_grade.php<?php echo '?id='.$get_id;  ?>";   
</script>

<?php } ?>