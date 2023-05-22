<?php
include '../../database/database.php';
$sql="SELECT * FROM subject_name";
$result=mysqli_query($connection,$sql);
$sql2="SELECT * FROM subject_name";
$result2=mysqli_query($connection,$sql2);
$sql1="SELECT * FROM question";
$result1=mysqli_query($connection,$sql1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/stylesheet-1.css">
    <script src="https://kit.fontawesome.com/c18972abce.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Questions</title>
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
        <div class="add-course" id="AddQuestion">
            <label>Add Question</label><br>
            <i class="fa-solid fa-plus"></i>
        </div>
        <div class="view-course" id="ViewQuestion">
            <label>View Questions</label><br>
            <i class="fa-solid fa-eye"></i>
        </div>
    </div>
    <div class="panels">
        <div class="add-course-panel" id="add-course-panel">
            <label for="">Available Courses</label><br>
            <select name="" id="select-course" class="fields">
                <option value="">--Available Courses--</option>
                <?php
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo '<option value='.$row['Subject_id'].'>'.$row['Name'].'</option>';
                    }
                ?>
            </select><br>
            <label>Question</label><br>
            <textarea name="" id="subject-question" class="fields" placeholder="Enter question ........."></textarea><br>
            <label>Marks</label><br>
            <input type="text" class="fields" id="question-marks" placeholder="Enter marks of question"><br>
            <label>Option 1</label><br>
            <input type="text" class="fields" id="question-option1" placeholder="Enter option 1"><br>
            <label>Option 2</label><br>
            <input type="text" class="fields" id="question-option2" placeholder="Enter option 2"><br>
            <label>Option 3</label><br>
            <input type="text" class="fields" id="question-option3" placeholder="Enter option 3"><br>
            <label>Option 4</label><br>
            <input type="text" class="fields" id="question-option4" placeholder="Enter option 4"><br>
            <label>Answer</label><br>
            <select name="" id="correct-answer" class="fields">
                <option value="">--Select Correct Option--</option>
                <option value="Option_1">Option 1</option>
                <option value="Option_2">Option 2</option>
                <option value="Option_3">Option 3</option>
                <option value="Option_4">Option 4</option>
            </select><br>
            <button class="save-course" id="SaveData">Add</button>
        </div>
        <div class="view-course-panel" id="view-course-panel">
            <label>View Questions</label><br>
            <select name="" id="display-question-of-selectd" class="fields">
                <option value="">--Select Course--</option>
                <?php
                    while($row=mysqli_fetch_assoc($result2))
                    {
                        echo '<option value='.$row['Subject_id'].'>'.$row['Name'].'</option>';
                    }
                ?>
            </select><br>
            <div class="question-style">
                <!-- <button class="delete-question-btn" data-id="'.$row['Question_id'].'">Delete</button>
                <p>'.$row['Question'].'</p>
                <li>'.$row['Option_1'].'</li>
                <li>'.$row['Option_2'].'</li>
                <li>'.$row['Option_3'].'</li>
                <li>'.$row['Option_4'].'</li>
                <p>Marks: <span>'.$row['Marks'].'</span></p>
                <hr> -->
             </div>
        </div>
    </div>
    <script src="../javascript/javascript1.js"></script>
    <script src="../javascript/javascript2.js"></script>
</body>

</html>