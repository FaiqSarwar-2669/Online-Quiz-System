<?php

// User Name: Faiq;
// Password=123;

$error = "";
$user_name = trim($_POST['user_name']);
$user_password = trim($_POST['user_password']);

if ($user_name == 'Faiq' && $user_password == '123') {
    header("Location: ../Admin-pages/first-page.php");
    exit();
} else if (empty($user_name)) {
    $error = "Enter the User Name";
} else if (empty($user_password)) {
    $error = "Enter the Password";
} else if ($user_name != 'Faiq') {
    $error = "Enter Correct User Name";
} else if ($user_password != '123') {
    $error = "Enter Correct Password";
}

if (!empty($error)) {
    header("Location: ../../login.php?error=" . urlencode($error));
    exit();
}