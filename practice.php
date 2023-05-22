<?php
include 'database/database.php';

$sql1 = "SELECT COUNT(Name) AS 'Total Course' FROM subject_name";
$result = mysqli_fetch_assoc(mysqli_query($connection, $sql1));
echo "Total number of courses: " . $result['Total Course'];