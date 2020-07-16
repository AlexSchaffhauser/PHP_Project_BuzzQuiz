<?php

require 'inc/functions.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    //Check if email exists in database
    $user = DB::queryFirstRow("SELECT * FROM quiz_data WHERE email=%s", $_POST['email']);

    //if email does not exist register it in database
    if(DB::count() == 0){
        DB::insert('quiz_data', [
            'name' => $_POST['name'],
            'age' => $_POST['age'],
            'email' => $_POST['email'],
          ]);
    }

    //set email as global variable
    $_SESSION['user'] = $_POST['email'];

    //Send user to quiz page
    header("Location: quiz.php");
    
}

echo $twig->render("home.twig");
?>