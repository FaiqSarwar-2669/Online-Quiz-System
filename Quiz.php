<?php

if(isset($_GET['id']))
{
    $id= $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="Admin-pages/styling/stylesheet-1.css">
    <script src="https://kit.fontawesome.com/c18972abce.js" crossorigin="anonymous"></script>
    <title>Attempt Quiz</title>
</head>
<body>
    <nav>
        <Label class="name-of-system">Online Quiz System</Label>
        <a href="index.php" class="logo1">Back</a>
    </nav>
    <div class="load-quiz-page">
        <button id="LoadQuiz" data-id="<?php echo $id; ?>">Start Attempt</button>
    </div>
    <div class="Quiz-panel"></div>
    <button onclick="done(<?php echo $id; ?>)" id="submitBtn">Submit</button>
    <script src="Admin-pages/javascript/javascript2.js"></script>
</body>
</html>