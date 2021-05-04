<?php
include('drawing_page_sql.php');
session_start();
//  Gets the form data and prints it to screen
$guess = $_GET["Guess"];


if (strcmp($guess, $_SESSION['word']) !== 0)
{
    print $guess;
}
else
{
    $guess = "correct";
    print $guess;
}






?>