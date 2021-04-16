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
    <link rel="stylesheet" href="CSS/user-profile-page.css">

</head>

<body>
    <!--NAVBAR-->
    <?php 
    session_start();
    include('navbar.php');
    include('user_profile_query.php');
    if (!isset($_SESSION['uname'])) {
        header("Location: index.php"); 
    }
    ?>

    <main>
        <div class="container-fluid h-100">
            <div class="row">
                <!--USER STATS-->
                <div class="col-md-3 col-xs-4">
                    <div class=" user-stats">
                        <h3 style="color: #ef969f">Player Stats</h3>
                        <p style="text-align: left; margin-left: 12.5%;">High Score: <?php if (isset($user_info['highScore'])) echo $user_info['highScore']; else echo "Unknown" ?></p>
                        <p style="text-align: left; margin-left: 12.5%;">Games Played:  <?php if (isset($user_info['gamesPlayed'])) echo $user_info['gamesPlayed']; else echo "Unknown" ?></p>
                    </div>
                </div>

                <!--USER PROFILE INFORMATION-->
                <div class="col-md-6 col-xs-8 user-profile">
                    <div class="user-info card bg-white">
                        <div class="card-body">
                            <div class="row icon-field">
                                <img class="edit-prof-pic" src="images/profile.jpeg" alt="Profile Photo">
                            </div>
                            <div class="row name-title">
                                <h3 class="col name" id="name">Hello, <?php if (isset($user_info['name'])) echo $user_info['name']; else echo "Unknown" ?></h3>
                                <p id="demo"></p>
                            </div>
                            <div class="info-fields">
                                <div class="row fullname-field">
                                    <p class="col-md-4">Name:</p>
                                    <p id="name" class="name text-secondary col-md-8"> <?php if (isset($user_info['name'])) echo $user_info['name']; else echo "Unknown" ?></p>
                                </div>
                                <div class="row username-field">
                                    <p class="col-md-4">Username:</p>
                                    <p id="username" class="username text-secondary col-md-8"> <?php if (isset($username)) echo $username; else echo "Unknown" ?></p>
                                </div>
                                <div class="row email-field">
                                    <p class="col-md-4">Email:</p>
                                    <p id="email" class="email text-secondary col-md-8" type="Email"> <?php if (isset($user_info['email'])) echo $user_info['email']; else echo "Unknown" ?>
                                    </p>
                                </div>
                            </div>

                            <!--USER PROFILE FORM-->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#update-modal">
                                Edit Profile
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog"
                        aria-labelledby="update-modal-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="update-modal-label">Edit User Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="user_profile_page.php">
                                        <br>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Name</span>
                                            </div>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-info" value="Save changes" name="update-btn" id="update-button"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="card bg-white party-card scrollable">
                        <div class="d-block card-body">
                            <h4 class="text-center" style="color: #ef969f">Parties</h4>
                            <ul class="parties list-group-flush" id="parties"
                                style="width: 75%; align-content: center;">
                                <?php foreach ($user_parties as $party)  : ?>
                                <li id="<?php echo $party['partyID'] ?>" class="list-group-item"><?php echo $party['partyName']?></li>
                                <?php endforeach; ?>
                            </ul>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#parties-modal">
                                Edit Parties
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="parties-modal" tabindex="-1" role="dialog"
                        aria-labelledby="parties-modal-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="parties-modal-label">Remove Party</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="user_profile_page.php">
                                        <?php foreach ($user_parties as $party)  : ?>
                                        <div class="form-check">
                                            <input required type="radio" class="form-check-input" name="remove-party" id="remove-<?php echo $party['partyID'] ?>" value="<?php echo $party['partyID'] ?>">
                                            <label class="form-check-label" for="remove-<?php echo $party['partyID'] ?>"><?php echo $party['partyName'] ?></label>
                                        </div>
                                        <?php endforeach; ?>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <input type="submit" name="remove-party-btn" class="btn btn-info" id="update-parties-button" value="Save changes"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $('#update-modal').on('shown.bs.modal', function () {
                            $('#myInput').trigger('focus')
                        })
                    </script>

                </div>

                <div class="col-md-3 col-xs-0"></div>
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