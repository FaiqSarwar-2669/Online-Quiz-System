<?php
include 'database/database.php';
$sql4="SELECT * FROM subject_name";
$result1=mysqli_query($connection, $sql4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin-pages/styling/stylesheet-1.css">
    <script src="https://kit.fontawesome.com/c18972abce.js" crossorigin="anonymous"></script>
    <title>Online Quiz</title>
</head>
<body>
    <nav>
        <Label class="name-of-system">Online Quiz System</Label>
        <a href="login.php" class="logo1">Login</a>
    </nav>
    <div id="all-quizes">
        <?php
        while ($data = mysqli_fetch_assoc($result1))
            {
                echo'<a href="Quiz.php?id='.$data['Subject_id'].'">
                        <div class="dispaly-quiz">
                            <label>'.$data['Name'].'</label><i class="fa-solid fa-square-pen"></i>
                        </div>
                    </a>';
            }
        ?>  
    </div>
</body>
</html>