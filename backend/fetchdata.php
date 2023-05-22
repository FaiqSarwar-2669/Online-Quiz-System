<?php
include '../database/database.php';
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$output="";
$sql = "SELECT subject_name.Name,subject_name.Subject_id ,COUNT(question.Question) AS 'Total Question', COALESCE(SUM(question.Marks),0) AS 'Total Marks'
FROM subject_name
LEFT JOIN question ON question.Subject_id = subject_name.Subject_id
GROUP BY subject_name.Name";
$result = mysqli_query($connection, $sql);
if(mysqli_num_rows($result)>0)
{
    $output='<tr>
            <th>Course Name</th>
            <th>Total Question</th>
            <th>Total Marks</th>
            <th>Delete</th>
        </tr>';
        while ($data = mysqli_fetch_assoc($result)) {
            $output.= '<tr>
                    <td>'.$data['Name'].'</td>
                    <td>'.$data['Total Question'].'</td>
                    <td>'.$data['Total Marks'].'</td>
                    <td><i class="fa-solid fa-trash" data-id="'.$data['Subject_id'].'"></i></td>
                </tr>';
        }
    echo $output;
}



