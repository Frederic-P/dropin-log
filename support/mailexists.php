<?php
session_start();
if ($_SESSION["role"] == "admin"){
  $user_db = new PDO("sqlite:../databases/users.db") or die ("Can't connect to the database");
  $mail = $_GET["mail"];
  $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
  $key = $_GET["key"];

  if ($key == "47a5aad72607424547b3e2cbcfd3749132928601f931a171e015b1a0c4ebb9b8f538cea9078a4488692fd992338f36f17cbc149f5c9e2709bf7aec907c67fee8"){
    //you need to connect to user, select on mail and if it finds one record, then that mail exists and should not be used.
    //otherwise it can be used safely ==> return true
    $query = "SELECT COUNT(*) FROM users WHERE mail='".$mail."' LIMIT 1";
    $count = $user_db->query($query);
    $amount = $count->fetchColumn();
    $response = array("amount"=>$amount);
    header("Content-Type: application/json");
    echo json_encode($response);
  }
} else {
  session_destroy();
  header("location: ../index.php");
}

 ?>
