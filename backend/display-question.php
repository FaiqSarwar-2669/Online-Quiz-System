<?php

include '../database/database.php';
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$value=$_POST['category_id'];
$sql = "SELECT * FROM `question` WHERE Subject_id=$value";
$result = mysqli_query($connection, $sql);
while($row=mysqli_fetch_assoc($result))
{
    echo '<div class="question-style">
            <button class="delete-question-btn" data-id="'.$row['Question_id'].'">Delete</button>
            <p>'.$row['Question'].'</p>
            <li>'.$row['Option_1'].'</li>
            <li>'.$row['Option_2'].'</li>
            <li>'.$row['Option_3'].'</li>
            <li>'.$row['Option_4'].'</li>
            <p>Marks: <span>'.$row['Marks'].'</span></p>
            <hr>
    </div>';
}





if(isset($_GET['display']) && $_GET['display']=='record')
{
    $value1=$_POST['data_value'];
    $sql2 = "SELECT * FROM `question` WHERE Subject_id=$value1";
    $result2 = mysqli_query($connection, $sql2);
    while($row=mysqli_fetch_assoc($result2))
    {
        echo '<div class="question-style">
                <i class="fa-solid fa-trash" id="delete_specific_question" data-id="'.$row['Question_id'].'"></i>
                <p>'.$row['Question'].'</p>
                <li>'.$row['Option_1'].'</li>
                <li>'.$row['Option_2'].'</li>
                <li>'.$row['Option_3'].'</li>
                <li>'.$row['Option_4'].'</li>
                <p>Marks: <span>'.$row['Marks'].'</span></p>
                <hr>
        </div>';
    }
}
