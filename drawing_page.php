<?php
require('connect-db.php');
include('drawing_page_sql.php');

session_start();

if (isset($_POST['guess'])){
    if ($_SESSION['word'] == $_POST['messages']){
        echo '<script>alert("Player guessed correctly!")</script>';
        //$_SESSION['score'] = getScore();
    }
}

if (isset($_GET['partyID'])){
}
$category = "animals";
if (isset($_GET['category'])){
    $category = $_GET['category'];
}
?>

<html>
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
    
    </head>
    


</script>
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="custom.css">

    <title>art, see!</title>

</head>


<body onload="init()">
    <header>
        <?php
        include('navbar.php');
        ?>
    </header>

    <div class="container">

        <div class="party">
            <div class="info">
                <h3 >Party Name</h3>
                <p style="font-size: 12px;">Category: <?php echo $category?> <br/> <!---TODO: get category info from data in groups page-->
                    Round 1/3
                </p>
            </div>
            <hr>
            3/10

            <ul style="list-style-type:none;padding-left:0;">
            <?php

            $colors = array("red","orange","yellow","green","blue","purple","pink","aquamarine","chartreuse","fuchsia");

            global $db;

            $query = "SELECT username from user WHERE userPartyID=1"; //TODO: get userPartyID from group page session

            $statement = $db->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll();

            $statement->closeCursor();

            $i = 0;

            foreach ($results as $result){
                echo "<li style=\"background:$colors[$i];padding-left:0;\">" . $result['username'] . "</li><br/>";
                $i++;      
            }
            ?>            
        </div>

        <div class="canvas .col-md-6">
            <div style="text-align: center;"><strong>Player 1</strong> is drawing <strong>
                <?php
                global $db;

                $query = "SELECT word FROM subcategory WHERE categoryName =:cat "; //TODO: get category from session, move function to drawing_page_sql.php

                $statement = $db->prepare($query);
                $statement->bindParam(':cat', $category, PDO::PARAM_STR);
                $statement->execute();
    
                $results = $statement->fetchAll();
    
                $statement->closeCursor();

                $max = count($results);

                $rng = rand(0,$max-1);

                $_SESSION['word'] = $results[$rng]['word'];

                echo $_SESSION['word'];
                ?></div> <!--TODO: use php to update player drawing and word with letter hints-->
            
            <div class="chat">
                <div class="row guesses">
                    <ul id="list" class="list">
                    </ul>
                </div>
                <div class="row answer" style="margin-left: 20px">
                    <form method="POST" action="">
                        <input type="text" name="messages" id="messages" style="bottom: 2px; position:absolute;">
                        <button type="button" value="Guess" name="guess" id="guess" class="btn btn-info">Guess</button>
                    </form>
                </div>
            </div>
            <canvas id="can" width="400" height="350"
                style="position:relative; border:2px solid;left:30%;">
            
            </canvas>

            
                <div id="countDiv" style="position:relative; left:20%;"></div>
            <div class="colors" style="position:relative;left:45%;width:10px;height:10px;background:green;" id="green"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;left:46%;width:10px;height:10px;background:blue;" id="blue"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;left:47%;width:10px;height:10px;background:red;" id="red"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;left:45%;width:10px;height:10px;background:yellow;" id="yellow"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;left:46%;width:10px;height:10px;background:orange;" id="orange"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;left:47%;width:10px;height:10px;background:black;" id="black"
                onclick="color(this)"></div>
            <div style="position:relative;top:20%;left:43%;">Eraser</div>
            <div style="position:relative;top:23%;left:45%;width:15px;height:15px;background:white;border:2px solid;"
                id="white" onclick="color(this)"></div>
            <img id="canvasimg" style="position:absolute;top:10%;left:52%;" style="display:none;">
            <!-- <input type="button" value="clear" id="clr" size="23" onclick="clear()"
                style="position:relative;top:55%;left:55%;"> -->
        </div>
<!-- 
        <div class="messages .col-md-3" style="background-color: grey;"> -->

        </div>
        
        <script type="text/javascript" src="drawing.js"></script>

        
        <?php 
        include('footer.html');
        ?>

</body>

</html>