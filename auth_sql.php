<?php
require("connect-db.php");


function userSignUp($username,$name, $email, $pwd){
    global $db;


    $stmt = $db->prepare("INSERT INTO user(username,name,email,pwd) VALUES (?,?,?,?)");
    $stmt->bindParam(1, $username, PDO::PARAM_STR);
    $stmt->bindParam(2, $name, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $pwd, PDO::PARAM_STR);

    if (!$stmt->execute()){
        return "Username already taken. Please try again with a new username.";
    }

    else{
        $stmt->execute();
        $_SESSION['uname'] = $_POST['username'];
        header('Location: groups_page.php');
    }

    $stmt->close();






}


?>