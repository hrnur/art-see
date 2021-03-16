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
    include('navbar.html');
    ?>

    <main>

        <div class="container-fluid">
            <div class="row card-deck" style="padding-top: 20px;">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card">
                        <h4 class="card-title text-center"> Step One: Choose a Category!</h4>
                        <div class="card-body">
                            <div class="row">
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
                            </div>
                            <hr>
                            <form>
                                <div class="list-group">
                                    <div class="form-check list-group-item">
                                        <input class="form-check-input" type="radio" name="category" value="Action" id="radio1">
                                        <label class="form-check-label" for="radio1">Action
                                        </label>
                                        <span class="float-right badge badge-pill badge-danger">Hard</span>
                                    </div>
                                    <div class="form-check list-group-item">
                                        <input class="form-check-input" type="radio" name="category" value="Action" id="radio2">
                                        <label class="form-check-label" for="radio2">Animals
                                        </label>
                                        <span class="float-right badge badge-pill badge-success">Easy</span>
                                    </div>
                                    <div class="form-check list-group-item">
                                        <input class="form-check-input" type="radio" name="category" value="Action" id="radio3">
                                        <label class="form-check-label" for="radio3">Books
                                        </label>
                                        <span class="float-right badge badge-pill badge-danger">Hard</span>
                                    </div>
                                    <div class="form-check list-group-item">
                                        <input class="form-check-input" type="radio" name="category" value="Action" id="radio4">
                                        <label class="form-check-label" for="radio4">Movies
                                        </label>
                                        <span class="float-right badge badge-pill badge-warning">Medium</span>
                                    </div>
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
                                <option value="SuperGuessers">SuperGuessers</option>
                                <option value="BikiniBottomSquad">BikiniBottomSquad</option>
                                <option value="WeRock">WeRock</option>
                            </select>
                            <br>
                            <hr>
                            <br>
                            <h5>Create a New Party</h5>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Party Name</span>
                                </div>
                                <input type="text" class="form-control" id="party-name" placeholder="Enter Party Name"
                                    required>
                                <div class="input-group-append">
                                    <button class="create-party-btn btn btn-primary" id="create-party-btn"
                                        onclick="createParty()">Create Party</button>
                                </div>
                            </div>
                            <br>
                            <div class="new-code d-inline-block">
                                <p class="d-inline">Party Code:</p>
                                <p class="d-inline" id="new-party-code"></p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <h5>Join a Party</h5>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Party Code</span>
                                </div>
                                <input type="text" class="form-control" id="party-code" placeholder="Enter Party Code"
                                    required>
                                <div class="input-group-append">
                                    <button class="join-party-btn btn btn-primary" id="join-party-btn"
                                        onclick="joinParty()">Join Party</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            function createParty() {
                                var parties_list = document.getElementById('select-party');
                                var item = document.getElementById('party-name').value;
                                var op = document.createElement("option");
                                op.setAttribute('value', item);
                                op.appendChild(document.createTextNode(item));
                                parties_list.appendChild(op);
                                document.getElementById("new-party-code").innerHTML = makeid(6);
                            }

                            function joinParty() {
                                if (confirm('Are you sure you want to join party ?')) {
                                    var parties_list = document.getElementById('select-party');
                                    var op = document.createElement("option");
                                    op.appendChild(document.createTextNode("New Party"));
                                    parties_list.appendChild(op);
                                } else
                                    e.preventDefault();
                            }

                            function makeid(length) {
                                var result = '';
                                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                                var charactersLength = characters.length;
                                for (var i = 0; i < length; i++) {
                                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                                }
                                return result;
                            }
                        </script>
                    </div>
                </div>
            </div>
            <br>
            <div class="start">
                <a class="start-game btn btn-primary btn-lg" href="drawing_page.php">Start Game!</a>
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