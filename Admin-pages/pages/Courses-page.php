<?php
include '../../database/database.php';
$sql="SELECT * FROM subject_name";
$result=mysqli_query($connection,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/stylesheet-1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/c18972abce.js" crossorigin="anonymous"></script>
    <title>Courses</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="../../index.php" class="logo">Logout</a>
        <ul>
            <li><a href="../first-page.php">Dashboard</a></li>
            <li><a href="../pages/Courses-page.php">Courses</a></li>
            <li><a href="../pages/Questions-page.php">Questions</a></li>
            <li><a href="../pages/record.php">Record</a></li>
        </ul>
    </nav>
    <div class="dashboard-items">
        <div class="add-course" >
            <label>Add Course</label><br>
            <i class="fa-solid fa-plus" id="AddCourse"></i>
        </div>
        <div class="view-course" id="ViewCourse">
            <label>View Courses</label><br>
            <i class="fa-solid fa-eye"></i>
        </div>
    </div>
    <div class="panels">
        <div class="add-course-panel" id="add-course-panel">
            <label for="">Available Courses</label><br>
            <select name="" id="" class="fields">
                <option value="">--Available--</option>
                <?php
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo '<option value='.$row['Subject_id'].'>'.$row['Name'].'</option>';
                    }
                ?>
            </select><br>
            <label>Enter Name Of New Course</label><br>
            <form action="../../backend/add-subject.php" method="POST">
                <input type="text" class="fields" name="Course-name" required placeholder="Enter Course Name"><br>
                <button class="save-course" id="SaveData">Add</button>
            </form>
        </div>
        <div class="view-course-panel" id="view-course-panel">
            <label>View Courses</label>
            <table id="course-tablel">
                
            </table>
        </div>
    </div>
    <script src="../javascript/javascript2.js"></script>
</body>

</html>