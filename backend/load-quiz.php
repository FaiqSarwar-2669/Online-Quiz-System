<?php
include '../database/database.php';
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_GET['id5']) && $_GET['id5']=='quiz')
{
    $output="";
    $id=$_POST['questionid'];
    $sql="SELECT * FROM question WHERE Subject_id=$id";
    $result=mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $output.='
            <p class="question-span">
                <span class="question-span">Q: </span>'.$row['Question'].'
            </p><span class="marks">[Marks:'.$row['Marks'].']</span>
            <input type="radio" name="'.$row['Question_id'].'" value="Option_1">
            <label>'.$row['Option_1'].'</label><br>
            <input type="radio" name="'.$row['Question_id'].'" value="Option_2">
            <label>'.$row['Option_2'].'</label><br>
            <input type="radio" name="'.$row['Question_id'].'" value="Option_3">
            <label>'.$row['Option_3'].'</label><br>
            <input type="radio" name="'.$row['Question_id'].'" value="Option_4">
            <label>'.$row['Option_4'].'</label><br>
            <hr>
            ';
        }
        $output.='<div class="userdata">
        <Label>Enter Name</Label>
        <input type="text" id="User-name"><br>
         </div>';
    echo $output;
    }else{
        echo "No Question Found!!!";
    }
    
}
if(isset($_GET['id6']) && $_GET['id6']=='quiz')
{
    $id=$_POST['id'];
    $selectedOptions=$_POST['selectedOptions'];
    $name=$_POST['name'];
    $sum=0;
    $total=0;
    $questionCount="";
    $query = "SELECT Question_id, Correct, Marks,Question FROM question WHERE Subject_id = $id";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $questionId = $row['Question_id'];
            $selectedOption = $row['Correct'];
            $marks = $row['Marks'];
            if (isset($selectedOptions[$questionId]) && $selectedOption == $selectedOptions[$questionId]) {
                $sum += $marks;
            }
        }
    }
    else{
        echo "Failed to execute it!";
    }
    $query30 = "SELECT SUM(Marks) AS Total FROM question WHERE Subject_id= $id";
    $result30=mysqli_query($connection,$query30);
    if($result30)
    {
        while($row=mysqli_fetch_assoc($result30))
        {
            $total=$row['Total'];
        }
    }
    $output="Marks Obtained: ". $sum."/".$total;
    $query3 = "SELECT COUNT(Marks) AS 'total' FROM question WHERE Subject_id = $id";
    $result = mysqli_query($connection, $query3);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $questionCount = $row['total'];
    }
    $query1="INSERT INTO `record` (`Subject_id`, `Name`, `Obtainted_marks`, `Total_marks`)
    VALUES ('$id', '$name', '$sum', '$questionCount')";
    if(mysqli_query($connection, $query1))
    {
        $output.= "\nSaved!!!";
    }
    echo $output;
    
}
