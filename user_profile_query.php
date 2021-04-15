<?php 
require("connect-db.php");
include("groups_query.php");

// LOAD PAGE INFORMATION
$username = $_SESSION['uname'];
$user_info = null;

function populate_user_info()
{
    global $username, $user_info, $db;
    $sql1 = "SELECT * FROM user WHERE username=:uname;";
    $stmt1 = $db->prepare($sql1);
    $stmt1->bindParam(':uname', $username, PDO::PARAM_STR);
    $stmt1->execute();
    $user_info = $stmt1->fetch(PDO::FETCH_ASSOC);
    $stmt1->closecursor();
}

populate_user_info();

// LIST PARTIES
list_parties();

// REMOVE PARTY
if (isset($_GET['remove-party-btn']))
{
    $pID = intval($_GET['remove-party']);
    $sql3 = "DELETE FROM member_of WHERE username=:uname AND partyID=:pID;";
    $stmt3 = $db->prepare($sql3);
    $stmt3->bindParam(':uname', $username, PDO::PARAM_STR);
    $stmt3->bindParam(':pID', $pID, PDO::PARAM_INT);
    $stmt3->execute();
    $stmt3->closecursor();
    // RESET GROUPS
    list_parties();
}

// EDIT PROFILE INFORMATION
if (isset($_GET['update-btn']))
{
    if (isset($_GET['name']) && isset($_GET['email']))
    {
        $newName = $_GET['name'];
        $newEmail = $_GET['email'];
        $sql6 = "UPDATE user SET name=:newName, email=:newEmail WHERE username=:uname;";
        $stmt6 = $db->prepare($sql6);
        $stmt6->bindParam(':newName', $newName, PDO::PARAM_STR);
        $stmt6->bindParam(':newEmail', $newEmail, PDO::PARAM_STR);
        $stmt6->bindParam(':uname', $username, PDO::PARAM_STR);
        $stmt6->execute();
        // RESET INFO
        populate_user_info();
    }
}
?>