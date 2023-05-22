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
    if($result)
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
    }
    
}
if(isset($_GET['id6']) && $_GET['id6']=='quiz')
{
    $id=$_POST['id'];
    $selectedOptions=$_POST['selectedOptions'];
    $name=$_POST['name'];
    $sum=0;
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
    $output='Wrong Questions <br>';
    while($row=mysqli_fetch_assoc($result))
    {
        $output.=$row['Question']; 
        $output.='Correct Option: '.$row['Correct'].'<br>'; 
    }
    $output.='<br>';
    $output.='Marks Obtained: '. $sum;
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
        echo "Saved!!!";
    }
    echo $output;
    
}
