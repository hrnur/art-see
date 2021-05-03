<?php
require("connect-db.php");
// include("auth_sql.php");
session_start();

// if (isset($_POST['action'])){
//   if (!empty($_POST['action']) && ($_POST['action'] == 'Sign Up')){
//       $error = userSignUp($_POST['username'],$_POST['firstName'] . " " . $_POST['lastName'],$_POST['email'],$_POST['pwd']);

//       echo $error;
//   }
// }

// if (isset($_POST['login'])){
//   $em = $_POST['em'];
//   $password = $_POST['password'];

//   if ($em != "" && $password != ""){
//     $query = "SELECT * FROM user WHERE email = ? AND pwd = ? LIMIT 1";
//     $stmt = $db->prepare($query);
//     $stmt->bindParam(1, $em, PDO::PARAM_STR);
//     $stmt->bindParam(2, $password, PDO::PARAM_STR);
//     $stmt->execute();
//     $info = $stmt->fetch();
//     $usern = $info['username'];
//     echo $query;
  
//   if ($info){
//     $_SESSION['uname'] = $usern;
//     header('Location: groups_page.php');
//   }
// }
//   else {
//     $error = "Invalid username or password"; //TODO: display error
//     echo $error;
//   }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!--PROGRAMMER:Hana & Monica-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--BOOTSTRAP SETUP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="CSS/index-page.css">
    <link rel="stylesheet" href="CSS/modal.css">

</head>

<body>
    <!--NAVBAR-->
    <div class="navbar">
        <a class="brand" index.php">
            <img class="logo-pic" src="images/logo.png" alt="art, see!">
        </a>
        <!--TODO: Will use php to include a separate navbar and footer file -->
        <!--https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_modal-->

        <!-- <div class="profile-info">
        <img class="prof-pic" src="images/profile.jpeg" alt="Profile Photo"> 
        <a class="prof-link text-secondary" href="#">Username</a>
    </div> -->
    
    </div>
    </div>
    <div class="welcome">
      <h2 class="display-1"><strong class="welcome-text">Welcome to art, see!</strong></h2>
      <h4> <small class="text-muted">Let your friends see your art! Can YOU make them guess the correct answer?</small>
      </h4>
    </div>

  

    <!--BOOTSTRAP SETUP-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    

    <!--FOOTER-->
<div class="footer">
    <p>Copyright &copy; 2021 Hana Nur, Monica Sandoval-Vasquez <a class="footer-link" href="index.php">art, see!</a></p>
</div>
</body>

</html>