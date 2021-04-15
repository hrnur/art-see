<?php 
require("connect-db.php");
$username = $_SESSION['uname'];

// LIST CATEGORIES
$sql1 = "SELECT categoryName FROM category;";
$stmt1 = $db->prepare($sql1);
$stmt1->execute();
$categories = $stmt1->fetchAll();
$stmt1->closecursor();

// LIST PARTIES
$user_parties = null;
$msg = null;

function list_parties()
{
    global $user_parties, $username, $db;
    $sql2 = "SELECT * FROM member_of NATURAL JOIN party WHERE username=:uname;";
    $stmt2 = $db->prepare($sql2);
    $stmt2->bindParam(':uname', $username, PDO::PARAM_STR);
    $stmt2->execute();
    $user_parties = $stmt2->fetchAll();
    $stmt2->closecursor();
}
list_parties();

// GENERATE CODE
function gen_code()
{
    $strong = true;
    $bytes_code = openssl_random_pseudo_bytes(3, $strong);
    return bin2hex($bytes_code);
}

// CREATE A PARTY
if (isset($_GET['create-btn']) && isset($_GET['newPartyName']))
{
    $code = gen_code();
    // VERIFY PARTY CODE IS UNIQUE
    $unique = false;
    while (!$unique) {
        $sql = "SELECT * FROM party WHERE code=:partyCode;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':partyCode', $code, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0)
            $unique = true;
        else
            $code = gen_code();
    }

    // INSERT INTO PARTY
    $partyName = $_GET['newPartyName'];
    // VERIFY PARTY NAME IS UNIQUE TO USER
    $sqli = "SELECT partyID FROM member_of NATURAL JOIN party WHERE username=:uname AND partyName=:partyName;";
    $stmti = $db->prepare($sqli);
    $stmti->bindParam(':uname', $username, PDO::PARAM_STR);
    $stmti->bindParam(':partyName', $partyName, PDO::PARAM_STR);
    $stmti->execute();
    if ($stmti->rowCount() == 0)
    {
        $sql3 = "INSERT INTO party (code, partyName, numMembers) VALUES (:partyCode , :partyName, 1);";
        $stmt3 = $db->prepare($sql3);
        $stmt3->bindParam(':partyCode', $code, PDO::PARAM_STR);
        $stmt3->bindParam(':partyName', $partyName, PDO::PARAM_STR);
        $stmt3->execute();
        $stmt3->closecursor();

        // INSERT INTO MEMBERS_OF
        $sql4 = "INSERT INTO member_of (username, partyID) VALUES (:uname , (SELECT partyID FROM party WHERE code=:partyCode AND partyName=:partyName LIMIT 1));";
        $stmt4 = $db->prepare($sql4);
        $stmt4->bindParam(':uname', $username, PDO::PARAM_STR);
        $stmt4->bindParam(':partyCode', $code, PDO::PARAM_STR);
        $stmt4->bindParam(':partyName', $partyName, PDO::PARAM_STR);
        $stmt4->execute();

        list_parties();
    }
    else
    {
        $msg = "You're already in a party named '". $partyName."'! Choose a different name.";
        $code = '';
    }
        
}

// JOIN A PARTY
if (isset($_GET['join-btn']) and isset($_GET['join-code']))
{
    $join_code = $_GET['join-code'];
    $sql6 = "INSERT INTO member_of (username, partyID) VALUES (:uname , (SELECT partyID FROM party WHERE code=:partyCode LIMIT 1));";
    $stmt6 = $db->prepare($sql6);
    $stmt6->bindParam(':uname', $username, PDO::PARAM_STR);
    $stmt6->bindParam(':partyCode', $join_code, PDO::PARAM_STR);
    $stmt6->execute();

    list_parties();
}
?>