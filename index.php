<?php
  $salt_1 = "Thor";
  $salt_2 = "TheGodOfHammers";
  session_start();
  $user_db = new PDO("sqlite:databases/users.db") or die ("Can't connect to the database");
  if(!empty($_POST["login"])) {
    $login_name = $_POST["user_name"];          // will be sanitized
    $login_name = filter_var($login_name, FILTER_SANITIZE_EMAIL);
    $_SESSION["uname"] = $login_name;
    $login_password = $_POST["password"];       // no sanitation applied!
    $salted = $salt_1.$login_password.$salt_2;
    $hashed_salt = hash("sha512", $salted);
    $query = "SELECT * FROM users WHERE login_name='".$login_name."' LIMIT 1";
    foreach ($user_db->query($query) as $row){
      $attempts = $row["failed_logins"];
      if($attempts >= 5){
        header("Location: suspended.php");
        exit;
      }
      if ($hashed_salt == $row["password"]){
        $_SESSION["uid"]= $row["ID"];
        $_SESSION["name"] = $row["first_name"];
        $_SESSION["role"] = $row["role"];
        $good_query = "UPDATE users SET failed_logins = '0' WHERE login_name='".$login_name."';";
        $user_db->query($good_query);
        $log_query = "INSERT INTO logins (user_id, session_date) VALUES (".$_SESSION['uid'].",".$_SERVER['REQUEST_TIME'].")";
        //$user_db->query($log_query);    //UNCOMMENT TO LOG logins!
      } else {
        $wrong_query = "UPDATE users SET failed_logins = '".($attempts+1) ."', last_login = '".$_SERVER['REQUEST_TIME']."'WHERE login_name='".$login_name."';";
        $error_message = "Wrong login credentials";
        $user_db->query($wrong_query);
        echo $error_message;
        echo $wrong_query;
      }
    }
  }
// end of user sessions creation
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css">
    <title>Home</title>
    <script type="text/javascript" src="javascript/clock.js"></script>
  </head>
  <body class="welcomebody" onload="time()">
    <?php
      include "support/navbar.php";
     ?>
     <p>use <a href="https://hubic.com/en/offers/storage-free" target="_blank">HUBIC</a> for file storage </p>
  </body>
</html>
