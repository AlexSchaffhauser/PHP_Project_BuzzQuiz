<?php

require 'inc/functions.inc.php';

if ( $_SERVER['REQUEST_METHOD'] == "GET"){
    //access DB with global variable
    $user = DB::queryFirstRow("SELECT * FROM quiz_data WHERE email=%s", $_SESSION['user']);

    //send back if no user in db
    if(DB::count() == 0){
        header("Location: index.php");
    }
    //send forward if user has completed the quiz
    if($user['complete'] == 1){
        header("Location: results.php");
    }
}
if ( $_SERVER['REQUEST_METHOD'] == "POST"){
    //access DB with global variable
    $user = DB::queryFirstRow("SELECT * FROM quiz_data WHERE email=%s", $_SESSION['user']);
    //update results into DB
    DB::update('quiz_data', [
        'question_1' => $_POST['question_1'],
        'question_2' => $_POST['question_2'],
        'question_3' => $_POST['question_3'],
        'question_4' => $_POST['question_4'],
        'question_5' => $_POST['question_5'],
        'complete' => 1], "email=%s", $_SESSION['user']);

    //send user to result page
    header("Location: results.php");
}

echo $twig->render("questions.twig");
?>