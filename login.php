<?php
include('dbcon.php');
if (isset($_POST['login'])){
    session_start();
    $student_no = $_POST['student_no'];
    $password = $_POST['password'];
    $query = "SELECT * FROM students WHERE student_no=? AND password=? AND status='active'";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $student_no, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if ($num_row > 0) {
        header('location:dasboard.php');
        $_SESSION['id'] = $row['student_id'];
    } else {
        header('location:access_denied.php');
    }
}
?>
