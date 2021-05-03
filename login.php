<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

$postdata = file_get_contents("php://input");

$request = json_decode($postdata);

$data = [];

foreach ($request as $k => $v)
{
  $temp = "$k => $v";
  $data[0]['post_'.$k] = $v;
}

$current_date = date("Y-m-d");

echo json_encode(['content'=>$data, 'response_on'=>$current_date]);
?>
<!-- if (isset($_POST['login'])){
    $em = $_POST['em'];
    $password = $_POST['password'];
  
    if ($em != "" && $password != ""){
      $query = "SELECT * FROM user WHERE email = ? AND pwd = ? LIMIT 1";
      $stmt = $db->prepare($query);
      $stmt->bindParam(1, $em, PDO::PARAM_STR);
      $stmt->bindParam(2, $password, PDO::PARAM_STR);
      $stmt->execute();
      $info = $stmt->fetch();
      $usern = $info['username'];
      echo $query;
    
    if ($info){
      $_SESSION['uname'] = $usern;
      header('Location: groups_page.php');
    }
  }
    else {
      $error = "Invalid username or password"; //TODO: display error
      echo $error;
    }
  }


?> -->