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
?>
<form method="POST" action="actions/answer.php" class="text-center">
    <h4>Question #<?=$question_index + 1?></h4>
    <h3><?= $current_question['question'] ?></h3>
    <?php
        foreach ($current_question['answers'] as $answer) {
    ?>
        <label>
            <input type="radio" name="user_answer" value="<?= $answer ?>" required> <?= $answer ?>
        </label>
        <br>
    <?php
        }
    ?>
    <button class="btn btn-success" type="submit">
        Next
    </button>
</form>
