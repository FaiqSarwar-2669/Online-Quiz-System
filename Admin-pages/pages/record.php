<?php
 include '../../database/database.php';
 $sql="SELECT * FROM record";
 $result=mysqli_query($connection,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/stylesheet-1.css">
    <script src="https://kit.fontawesome.com/c18972abce.js" crossorigin="anonymous"></script>
    <title>Record</title>
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
        <div>
            <table id="record-tablel">
            <tr>
                <th>ID</th>
                <th>Subject ID</th>
                <th>Name</th>
                <th>Obtained Marks</th>
                <th>Total Marks</th>
            </tr>
            <?php
                while($row=mysqli_fetch_assoc($result))
                {
                    echo'
                    <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['Subject_id'].'</td>
                        <td>'.$row['Name'].'</td>
                        <td>'.$row['Obtainted_marks'].'</td>
                        <td>'.$row['Total_marks'].'</td>
                    </tr>
                    ';
                }
            ?>
            </table>
        </div>
    </div>
</body>

</html>