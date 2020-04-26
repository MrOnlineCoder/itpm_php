<?php
require 'guard.php';

require __DIR__ . '/../db/db.php';

$db = loadDB();

$question_index = $_SESSION['question_index'];
$current_question = $db[$question_index];

function find_existing_answer($question_text) {
    $answer_index = -1;

    for ($i = 0; $i < count($_SESSION['answers']); $i++) {
        $iteration_answer = $_SESSION['answers'][$i];

        if ($iteration_answer['question'] == $question_text) {
            $answer_index = $i;
            break;
        }
    }   

    return $answer_index;
}

$user_answer = $_POST['user_answer'];

$_SESSION['question_index'] = $question_index + 1;

//Form user answer item, it will be pushed to session 'answers' array
$answer_item = array();
$answer_item['question'] = $current_question['question'];
$answer_item['user_answer'] = $user_answer;
$answer_item['correct_answer'] = $current_question['correct'];

$answer_index = find_existing_answer($current_question['question']);

//If user has already answered this question before, just change the answer
if ($answer_index == -1) {
    array_push($_SESSION['answers'], $answer_item);
    $_SESSION['total']++;
} else {
    $_SESSION['answers'][$answer_index]['user_answer'] = $answer_item['user_answer'];
}

if ($question_index + 1 >= count($db)) {
   $_SESSION['finished'] = true;

   //Count correct answers
   $correct = 0;

   foreach ($_SESSION['answers'] as $item) {
       if ($item['user_answer'] == $item['correct_answer']) {
           $correct++;
       }
   }

   $_SESSION['correct'] = $correct;
}

header('Location: ../index.php');
?>