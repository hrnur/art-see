<?php

// header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

// retrieve data from the request
$postdata = file_get_contents("php://input");

// Process data
// (this example simply extracts the data and restructures them back)

// Extract json format to PHP array
$request = json_decode($postdata);

echo $postdata;

$data = [];
// foreach ($request as $k => $v)
// {
//   $temp = "$k => $v";
//   $data[0]['post_'.$k] = $v;
// }
// $temp will have the last key-value pair of the array

// $current_date = date("Y-m-d");

// Send response (in json format) back the front end
echo json_encode(['content'=>$data, 'response_on'=>$current_date]);
?>


<!-- <?php
// require("connect-db.php");
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
// header('Access-Control-Max-Age: 1000');
// header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

// function userSignUp($username,$name, $email, $pwd){
//     global $db;


//     $stmt = $db->prepare("INSERT INTO user(username,name,email,pwd) VALUES (?,?,?,?)");
//     $stmt->bindParam(1, $username, PDO::PARAM_STR);
//     $stmt->bindParam(2, $name, PDO::PARAM_STR);
//     $stmt->bindParam(3, $email, PDO::PARAM_STR);
//     $stmt->bindParam(4, $pwd, PDO::PARAM_STR);

//     if (!$stmt->execute()){
//         return "Username already taken. Please try again with a new username.";
//     }

//     else{
//         $stmt->execute();
//         $_SESSION['uname'] = $_POST['username'];
//         header('Location: groups_page.php');
//     }

//     $stmt->close();






// }


?> -->