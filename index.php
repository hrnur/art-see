<?php
require("connect-db.php");
include("auth_sql.php");
session_start();

if (isset($_POST['action'])){
  if (!empty($_POST['action']) && ($_POST['action'] == 'Sign Up')){
      $error = userSignUp($_POST['username'],$_POST['firstName'] . " " . $_POST['lastName'],$_POST['email'],$_POST['pwd']);

      echo $error;
  }
}

if (isset($_POST['login'])){
  $em = $_POST['em'];
  $password = $_POST['password'];

  if ($em != "" && $password != ""){
    $query = "SELECT * FROM user WHERE email = ? AND pwd = ? LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $em, PDO::PARAM_STR);
    $stmt->bindParam(2, $password, PDO::PARAM_STR);
    $stmt->execute();
    $info = $stmt->fetch();
    $usern = $info['username'];
    echo $query;
  
  if ($info){
    $_SESSION['uname'] = $usern;
    header('Location: groups_page.php');
  }
}
  else {
    $error = "Invalid username or password"; //TODO: display error
    echo $error;
  }
}
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
        <a class="brand" href="index.php">
            <img class="logo-pic" src="images/logo.png" alt="art, see!">
        </a>
        <!--TODO: Will use php to include a separate navbar and footer file -->
        <!--https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_modal-->
        <button type="button" class="btn btn-info" id="myBtn" href="groups_page.php">Login</button>
        <div id="myModal" class="modal">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="container">
                    <div class="row" style="width: 100%;">
                      <div class="col">
                        <form method="POST" action="">
                            <h1>Login</h1>
                            <br>
                            <div class="form-group">
                              <input type="email" name="em" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <input type="submit" value="Login" name="login" id="login" class="btn btn-info">
                          </form>
                      </div>
                    </div>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
              document.getElementById("exampleInputEmail1").focus();
            }
            
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            </script>

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
      <p class="text-muted" style="font-size: 10pt; text-align: center;">Don't have an account?<a href="" data-toggle="modal" data-target="#signUpModal">
        Sign Up
      </a> here! </p>
    </div>

    <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="" >
              <h1>Sign Up</h1>
              <div class="form-group">
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
              </div>
              <div class="form-group">
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <input name="pwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
              </div>
              <button type="submit" class="btn btn-info" value="Sign Up" name="action" id="action">Submit</button>
            </form>
          </div>
        </div>
      </div>
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