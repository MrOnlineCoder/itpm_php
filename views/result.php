<?php
session_start();

$participant = $_SESSION['participant'];
$correct = $_SESSION['correct'];

$mark = round(100 * $_SESSION['correct'] / $_SESSION['total'], 2);

function getRowClass($item) {
    if ($item['user_answer'] == $item['correct_answer']) {
        return 'table-success';
    } else {
        return 'table-danger';
    }
}
?>

<div class="alert alert-success">
Dear <b><?=$participant?>!</b> You have completed the test and answered <b><?=$correct?></b> questions correctly.</b>
</div>
<br>
<br>
<h4>Summary</h4>
<table class="table table-hover">
    <thead>
        <th>#</th>
        <th>Question</th>
        <th>Your answer</th>
        <th>Correct answer</th>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['answers'] as $index => $item) { ?>
        <tr class="<?=getRowClass($item)?>">    
            <td>
                <?=$index+1?>
            </td>
            <td>
                <?=$item['question']?>
            </td>
           <td>
                <?=$item['user_answer']?>
            </td>
            <td>
                <?=$item['correct_answer']?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="text-right w-100">
<h3>
Result: <span class="text-success">
        <?= $mark ?>%
</span>
</h3>
</div>
<br>
<a href="index.php">
<button class="btn btn-primary">
Back to mainpage
</button>
</a>

<?php
session_destroy();
?>