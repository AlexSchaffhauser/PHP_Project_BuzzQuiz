<?php

require 'inc/functions.inc.php';

//user's answer variables default
$answers = array("q1" => 1, "q2" => 1, "q3" => 1, "q4" => 1, "q5" => 1);

if ( $_SERVER['REQUEST_METHOD'] == "GET"){
    //access DB with global variable
    $user = DB::queryFirstRow("SELECT * FROM quiz_data WHERE email=%s", $_SESSION['user']);

    //var_dump($user);

    //send to index if no user in db
    if(DB::count() == 0){
        header("Location: index.php");
    }
    //send to quiz if user has not completed the quiz
    if($user['complete'] != 1){
        header("Location: quiz.php");
    }

    //fill variables
    $answers["q1"] = $user['question_1'];
    $answers["q2"] = $user['question_2'];
    $answers["q3"] = $user['question_3'];
    $answers["q4"] = $user['question_4'];
    $answers["q5"] = $user['question_5'];

    //var_dump($answers);
}

echo $twig->render("results.twig", $answers);
?>