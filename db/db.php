<?php
//
//loadDB()
//Returns array of questions, loaded from testdb.txt file
//
function loadDB() {
    $raw = file_get_contents(__DIR__ . "/../db/testdb.txt");

    $lines = explode("\n", $raw);

    $i = 0;

    $db = array();

    while ($i < count($lines)) {
        $question = $lines[$i];
        $correct = "";
        $answers = array();

        //There are 4 answers for each question
        for ($j = 1; $j <= 4; $j++) {
            $raw_answer = $lines[$i+$j];

            $answer = substr($raw_answer, 1);

            $is_correct = $raw_answer[0] == "+";

            if ($is_correct) {
                $correct = $answer;
            }

            array_push($answers, $answer);
        }

        //Form the database record
        $record = array();
        $record['question'] = $question;
        $record['answers'] = $answers;
        $record['correct'] = $correct;

        array_push($db, $record);

        $i += 5;
    }

    return $db;
}

?>