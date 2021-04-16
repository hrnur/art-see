<!DOCTYPE html>
<html lang="en">

<head>
    <!--PROGRAMMER:Hana-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--BOOTSTRAP SETUP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="CSS/groups-page.css">

</head>

<body>
    <!--NAVBAR-->
    <?php 
    session_start();
    if (!isset($_SESSION['uname'])) {
       header("Location: index.php"); 
    }
    include('navbar.php');
    include('groups_query.php');
    $link = false;
    ?>

    <main>

        <div class="container-fluid h-100">
            <div class="row" style="padding-top: 20px;">
                <div class="col-md-8 col-xs-6 h-100">
                    <div class="card h-100">
                        <form method="post">
                            <div class="card-body">
                                <div class="col scrollable">
                                    <h4 class="card-title text-center"> Step One: Choose a Category!</h4>
                                    <div class="list-group">
                                        <?php foreach ($categories as $category)  : ?>
                                            <div class="form-check list-group-item">
                                                <input class="form-check-input" type="radio" name="category" value="<?php echo $category['categoryName']?>" id="<?php echo $category['categoryName']?>">
                                                <label class="form-check-label" for="radio1"><?php echo $category['categoryName']?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <br/>
                                <div class="col scrollable">
                                    <h4 class="card-title text-center"> Step Two: Pick a Party!</h4>
                                    <div class="list-group">
                                        <?php foreach ($user_parties as $party)  : ?>
                                            <div class="form-check list-group-item">
                                                <input class="form-check-input" type="radio" name="party" value="<?php echo $party['partyID']?>" id="<?php echo $party['partyID']?>">
                                                <label class="form-check-label" for="radio1"><?php echo $party['partyName']?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="start">
                                    <input type="submit" class="start-game btn btn-info btn-lg" value="Start Game!"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 h-100">
                    <div class="card h-100">
                        <div class="card-body align-self-center">
                            <br>
                            <h5>Create a New Party</h5>
                            <form action="groups_page.php" method="get">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Party Name</span>
                                    </div>
                                    <input type="text" name="newPartyName" class="form-control" id="party-name" placeholder="Enter Party Name" required>
                                    <div class="input-group-append">
                                        <input type="submit" name="create-btn" class="btn btn-info btn-md" id="create-party-btn" value="Create Party"/>
                                    </div>
                                </div>
                            </form>
                            <div class="error-msg">
                                        <small id="createPartyInvalid" class="text-danger"><?php if (isset($msg)) echo $msg;?></small>
                                    </div>
                            <br>
                            <div class="new-code d-inline-block">
                                <p class="d-inline">Party Code:</p>
                                <p class="d-inline" id="new-party-code"><?php if (isset($code)) echo $code ;?></p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <h5>Join a Party</h5>
                            <form action="groups_page.php" method="get">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Party Code</span>
                                    </div>
                                    <input type="text" name="join-code" class="form-control" id="party-code" placeholder="Enter Party Code" aria-required="true" required>
                                    <div class="input-group-append">
                                        <input type="submit" name="join-btn" class="btn btn-info" id="join-party-btn" value="Join Party"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <?php 
            if (isset($_POST['category']) && isset($_POST['party']))
            {
                $rewrite = "partyID=".$_POST['party']."&category=".$_POST['category'];
                $link = true;
            }
            if ($link):
            ?>
            <script type="text/javascript">
            document.location.href = 'drawing_page.php?<?php if(isset($rewrite)) echo $rewrite;?>';
            </script>
            <?php endif?>
            
        </div>
    </main>

    <!--BOOTSTRAP SETUP-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <?php 
    include('footer.html');
    ?>

</body>

</html>