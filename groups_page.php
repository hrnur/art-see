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
    ?>

    <main>

        <div class="container-fluid">
            <div class="row card-deck" style="padding-top: 20px;">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card">
                        <h4 class="card-title text-center"> Step One: Choose a Category!</h4>
                        <div class="card-body">
                            <div class="row">
                                <!--
                                TODO: Use Angular to sort and filter category model instances

                                <div class="col-md-6 dropdown justify-content-center">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        id="sortDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Sort by
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Easy to Hard</a>
                                        <a class="dropdown-item" href="#">Hard to Easy</a>
                                    </div>
                                </div>
                                <div class="col-md-6 dropdown align-self-center">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        id="filterDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Filter
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Easy</a>
                                        <a class="dropdown-item" href="#">Medium</a>
                                        <a class="dropdown-item" href="#">Hard</a>
                                    </div>
                                </div>
                            -->
                            </div>
                            <hr>
                            <form>
                                <div class="list-group">
                                <?php foreach ($categories as $category)  : ?>
                                    <div class="form-check list-group-item">
                                        <input class="form-check-input" type="radio" name="category" value="<?php echo $category['categoryName']?>" id="<?php echo $category['categoryName']?>">
                                        <label class="form-check-label" for="radio1"><?php echo $category['categoryName']?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card">
                        <h4 class="card-title text-center">Step Two: Pick a Party!</h4>
                        <div class="card-body align-self-center">
                            <select class="custom-select" id="select-party" aria-labelledby="dropdownMenuButton">
                                <option selected>Select Party</option>
                                <?php foreach ($user_parties as $party)  : ?>
                                <option value="<?php echo $party['partyID'] ?>"><?php echo $party['partyName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <hr>
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
            <br>
            <div class="start">
                <a class="start-game btn btn-info btn-lg" href="drawing_page.php">Start Game!</a>
            </div>
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