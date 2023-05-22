<?php
include '../database/database.php';
$sql1 = "SELECT COUNT(Name) AS 'Total Course' FROM subject_name";
$result = mysqli_fetch_assoc(mysqli_query($connection, $sql1));
$sql2 = "SELECT COUNT(Question) as 'total' FROM question";
$result2 = mysqli_fetch_assoc(mysqli_query($connection, $sql2));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/stylesheet-1.css">
    <script src="https://kit.fontawesome.com/c18972abce.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="../index.php" class="logo">Logout</a>
        <ul>
            <li><a href="first-page.php">Dashboard</a></li>
            <li><a href="pages/Courses-page.php">Courses</a></li>
            <li><a href="pages/Questions-page.php">Questions</a></li>
            <li><a href="pages/record.php">Record</a></li>
        </ul>
    </nav>
    <div class="dashboard-items">
        <div class="total-course">
            <label>Total Courses</label><br>
            <i class="fa-solid fa-book"></i><br>
            <p class="output" id="count-total-courses"><?php echo $result['Total Course'];?></p>
        </div>
        <div class="total-question">
            <label>Total Questions</label><br>
            <i class="fa-sharp fa-regular fa-circle-question"></i><br>
            <p class="output"><?php echo $result2['total'];?></p>
        </div>
    </div>
</body>

</html>