<?php
session_start();

if (!$_SESSION['testing']) {
    header('Location: ../index.php');
    return;
}

require __DIR__ . '/../db/db.php';

$db = loadDB();

$question_index = $_SESSION['question_index'];
$current_question = $db[$question_index];

$user_answer = $_POST['user_answer'];

if ($current_question['correct'] == $user_answer) {
    $_SESSION['correct']++;
}

$_SESSION['question_index'] = $question_index + 1;
$_SESSION['total']++;

$answer_item = array();
$answer_item['question'] = $current_question['question'];
$answer_item['user_answer'] = $user_answer;
$answer_item['correct_answer'] = $current_question['correct'];

array_push($_SESSION['answers'], $answer_item);

if ($question_index + 1 >= count($db)) {
   $_SESSION['finished'] = true;
}

header('Location: ../index.php');
?>