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
    include('navbar.html');
    ?>

    <main>
        <div class="container-fluid h-100">
            <div class="row">
                <!--USER STATS-->
                <div class="col-md-3 col-xs-4">
                    <div class=" user-stats">
                        <h3 style="color: #ef969f">Player Stats</h3>
                        <p style="text-align: left; margin-left: 12.5%;">High Score: 200</p>
                        <p style="text-align: left; margin-left: 12.5%;">Games Played: 47</p>
                    </div>
                </div>

                <!--USER PROFILE INFORMATION-->
                <div class="col-md-6 col-xs-8 user-profile">
                    <div class="user-info card bg-white">
                        <div class="card-body">
                            <div class="row icon-field">
                                <img class="edit-prof-pic" src="images/profile.jpeg" alt="Profile Photo">
                            </div>
                            <div class="row name-field">
                                <h3 class="col name" id="name">Patrick Star</h3>
                                <p id="demo"></p>
                            </div>
                            <div class="info-fields">
                                <div class="row username-field">
                                    <p class="col-md-4">Username:</p>
                                    <p id="username" class="username text-secondary col-md-8">pStar5</p>
                                </div>
                                <div class="row email-field">
                                    <p class="col-md-4">Email:</p>
                                    <p id="email" class="email text-secondary col-md-8" type="Email">pStar5@gmail.com
                                    </p>
                                </div>
                            </div>

                            <!--USER PROFILE FORM-->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-modal">
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
                                    <form onsubmit="" id="needs-validation">
                                        <br>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Name</span>
                                            </div>
                                            <input type="text" class="form-control" id="updated-name"
                                                placeholder="Enter Name" required>
                                            <p class="text-danger" id="invalid-name">
                                            </p>
                                        </div>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Username</span>
                                            </div>
                                            <input type="text" class="form-control" id="updated-username"
                                                placeholder="Enter Username" required>
                                            <p class="text-danger" id="invalid-user">
                                            </p>
                                        </div>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input type="email" class="form-control" id="updated-email"
                                                aria-describedby="emailHelp" placeholder="Enter Email" required>
                                            <p class="text-danger" id="invalid-email">
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button onclick="updateProfile()" type="button" class="btn btn-primary"
                                                id="update-button">Save
                                                changes</button>
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
                                <li id="1" class="list-group-item">SuperGuessers
                                    <button class="party-btn btn btn-danger float-right" id="party-btn"
                                        onclick="removeParty('1')">Remove</button>
                                </li>
                                <li id="2" class="list-group-item">BikiniBottomSquad
                                    <button class="party-btn btn btn-danger float-right" id="party-btn"
                                        onclick="removeParty('2')">Remove</button>
                                </li>
                                <li id="3" class="list-group-item">WeRock
                                    <button class="party-btn btn btn-danger float-right" id="party-btn"
                                        onclick="removeParty('3')">Remove</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <script>
                        $('#update-modal').on('shown.bs.modal', function () {
                            $('#myInput').trigger('focus')
                        })

                        function updateProfile() {
                            var name = document.getElementById("updated-name").value;
                            var user = document.getElementById("updated-username").value;
                            var email = document.getElementById("updated-email").value;

                            if (name.length != 0 && user.length != 0 && email.length != 0) {
                                document.getElementById("name").innerHTML = name;
                                document.getElementById("username").innerText = user;
                                document.getElementById("email").innerText = email;
                                $('#update-modal').modal('hide')
                            } else {
                                if (name.length == 0)
                                    document.getElementById("invalid-name").innerHTML = 'Please provide a name.'
                                else
                                    document.getElementById("invalid-name").innerHTML = ''
                                if (user.length == 0)
                                    document.getElementById("invalid-user").innerHTML = 'Please provide a username.'
                                else
                                    document.getElementById("invalid-user").innerHTML = ''
                                if (email.length == 0)
                                    document.getElementById("invalid-email").innerHTML = 'Please provide an email.'
                                else
                                    document.getElementById("invalid-email").innerHTML = ''
                            }
                        }

                        function removeParty(id) {
                            if (confirm('Are you sure you want to delete this category ?')) {
                                var parties_list = document.getElementById('parties');
                                var item = document.getElementById(id);
                                parties_list.removeChild(item);
                            } else {
                                e.preventDefault();
                            }
                        }
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