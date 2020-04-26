<?php
require 'guard.php';

function skip_question() {
    $_SESSION['question_index']++;
}

function previous_question() {
    $question_index = $_SESSION['question_index'];

    if ($question_index > 0) $_SESSION['question_index']--;
}   

if (isset($_GET['previous'])) previous_question();
if (isset($_GET['skip'])) skip_question();

header('Location: ../index.php');
?>