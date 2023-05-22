<?php
include '../database/database.php';

if(isset($_GET['add']) && $_GET['add']=='question')
{
    $course_id=trim($_POST['select_course']);
    $question=trim($_POST['subject_question']);
    $marks=trim($_POST['question_marks']);
    $option1=trim($_POST['question_option1']);
    $option2=trim($_POST['question_option2']);
    $option3=trim($_POST['question_option3']);
    $option4=trim($_POST['question_option4']);
    $answer=$_POST['correct_answer'];
    if(empty($course_id))
    {
        echo "Slect the course in which you add a question!";
    }
   
    else if(empty($question))
    {
        echo "Write the question!";
    }
    else if(empty($marks))
    {
        echo "Enter marks of question!";
    }
    else if (!is_numeric($marks))
    {
        echo "Enter the marks in Integer!";
    }
    else if(empty($option1))
    {
        echo "Enter option of question!";
    }
    else if(empty($option2))
    {
        echo "Enter option2 of question!";
    }
    else if(empty($option3))
    {
        echo "Enter option3 of question!";
    }
    else if(empty($option4))
    {
        echo "Enter option4 of question!";
    }
    else if(empty($answer))
    {
        echo "Enter corect option of question!";
    }
    else
    {
        $sql="INSERT INTO `question` (`Question`, `Option_1`, `Option_2`, `Option_3`, `Option_4`, `Correct`, `Marks`, `Subject_id`) VALUES 
        ('$question', '$option1', '$option2', '$option3', '$option4', '$answer', '$marks', '$course_id')";
        mysqli_query($connection,$sql);
        if($sql)
        {
            echo "Question added Successfully!!";
        }
        else
        {
            echo "Error: " . $query . "<br>" . $connection->error;
        }
    }

}