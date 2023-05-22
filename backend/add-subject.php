<?php
include '../database/database.php';


$Subject=$_POST['Course-name'];

$query="INSERT INTO `subject_name` (`Name`) VALUES ('$Subject')";
mysqli_query($connection,$query);
if($query)
{
    header("Location: ../Admin-pages/pages/courses-page.php");
}
else
{
    echo "Error: " . $query . "<br>" . $connection->error;
}


