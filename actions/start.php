<?php
$name = $_POST["name"];

if (!isset($name)) {
    die('Invalid form param.');
}

session_start();
$_SESSION['testing'] = true;
$_SESSION['participant'] = $name;
$_SESSION['question_index'] = 0;
$_SESSION['answers'] = array(); 
$_SESSION['total'] = 0;

header('Location: ../index.php');
?>