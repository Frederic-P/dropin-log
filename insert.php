<?php
session_start();

if (!isset($_SESSION["uid"])){
  header ("Location: index.php");
  exit;
}

if ($_SESSION["role"] == "admin"){
  $can_add = true;
}else{
  header ("Location: index.php");
  exit;
  }

if(!empty($_POST["create_user"]) and $can_add){
  $mail = $_POST["mail"];
  $fn = $_POST["name"];
  $ln = $_POST["surname"];
  $dept = $_POST["dept"];
  $role = $_POST["rolelist"];

  $open  = 1;
  $invite_code = hash("sha256", uniqid());

  //$create_user_query = "INSERT INTO users (first_name, last_name, department, role, invite_code, open) VALUES (".$fn.",".$ln.", ".$dept.", ".$role.", ".$invite_code.",".$open.")";
  //$user_db->query($create_user_query);

  $msg = "Welcome ".$fn.", \n \n Your administrator has created a new account for you. You can set a password by visitinig http://localhost/app/verify and provide your invite code.\n Your invite code is: ".$invite_code.".";
  $headers = "From: frederic_pietowski@hotmail.com";
  mail("frederic_pietowski@hotmail.com", "Registration", $msg, $headers);

}else{
  header("location: new_user.php");
}


?>
