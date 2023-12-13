<?php
$connection = mysqli_connect('localhost', 'root', '', 'db_pittsgis');
if (!$connection) {
    die('Database connection error: ' . mysqli_connect_error());
}

mysqli_select_db($connection, 'db_pittsgis') or die(mysqli_error($connection));

?>