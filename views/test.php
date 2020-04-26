<?php
session_start();

require __DIR__ . '/../db/db.php';

$db = loadDB();

$question_index = $_SESSION['question_index'];
$current_question = $db[$question_index];

$already_answered = null;

foreach ($_SESSION['answers'] as $answer) {
    if ($answer['question'] == $current_question['question']) {
        $already_answered = $answer;
        break;
    }
}

function is_radio_checked($val) {
    global $already_answered;
    
    if (!$already_answered) return false;

    return $already_answered['user_answer'] == $val;
}
?>
<form method="POST" action="actions/answer.php" class="text-center">
    <h4>Question #<?=$question_index + 1?></h4>
    <h3><?= $current_question['question'] ?></h3>
    <?php
        foreach ($current_question['answers'] as $answer) {
    ?>
        <label>
            <input type="radio" name="user_answer" value="<?= $answer ?>" <?php echo is_radio_checked($answer) ? 'checked' : ''?> required> <?= $answer ?>
        </label>
        <br>
    <?php
        }
    ?>

    <button class="btn btn-success" type="submit">
            Next ->
    </button>
</form>

<form action="actions/navigate.php">
    <div class="d-flex justify-content-between">
    <?php if ($question_index > 0) {?>
        <button class="btn btn-warning" type="submit" name="previous">
            <- Previous question
        </button>
    <?php } ?>

    <?php if ($question_index < count($db) - 1) {?>
         <button class="btn btn-warning" type="submit" name="skip">
            Skip question
        </button>
    <?php } ?>
    </div>
</form>
