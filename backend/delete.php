<?php
include '../database/database.php';
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['delete']) && $_GET['delete']=='question')
{
    $id=$_POST['questionid'];
    $sql = "DELETE FROM question WHERE Question_id=$id";
    if (mysqli_query($connection, $sql)) {
        echo ("Successfully deleted!!");
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}
if(isset($_GET['delete']) && $_GET['delete']=='subject')
{
    $id2=$_POST['subjectid'];
    $sql3="DELETE FROM subject_name WHERE Subject_id=$id2";
    if (mysqli_query($connection, $sql3)) {
        $sql4 = "DELETE FROM question WHERE Subject_id=$id2";
        if (mysqli_query($connection, $sql4)) {
            echo ("Successfully deleted!!");
        }
        else {
            echo "Error deleting record: " . mysqli_error($connection);
        }
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}
