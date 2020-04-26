<?php
require 'guard.php';

require __DIR__ . '/../db/db.php';

$db = loadDB();

function skip_question() {
    global $db;
    
    $_SESSION['question_index']++;

    if ($_SESSION['question_index'] >= count($db)) 
        $_SESSION['question_index'] = count($db) - 1;
}

function previous_question() {
    $question_index = $_SESSION['question_index'];

    if ($question_index > 0) $_SESSION['question_index']--;
}   

if (isset($_GET['previous'])) previous_question();
if (isset($_GET['skip'])) skip_question();

header('Location: ../index.php');
?>