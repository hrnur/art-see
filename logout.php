<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
  <title>art-see</title>    
</head>
<body>
<?php session_start();?>

  <div class="container">
    <h1>art-see</h1>
    
    Successfully logged out 
  </div>

  <?php 
  if (count($_SESSION) > 0)
  {
    foreach($_SESSION as $k => $v)
    {
      unset($_SESSION[$k]);
    }
    session_destroy();
  }
  ?>


</body>
</html>
