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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add new user</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/master.css">
    <script type="text/javascript" src="javascript/clock.js"></script>
  </head>
  <body class="welcomebody" onload="time()">
    <?php
      include "support/navbar.php";
     ?>
    <!-- checks if mail exists -->
        <script type="text/javascript">
          var key = "47a5aad72607424547b3e2cbcfd3749132928601f931a171e015b1a0c4ebb9b8f538cea9078a4488692fd992338f36f17cbc149f5c9e2709bf7aec907c67fee8";
          function check(){
            var mail = document.getElementById("mailinputbox").value;
            var maillen = mail.length;
            var fn = document.getElementById("userfninputbox").value.length;
            var ln = document.getElementById("userlninputbox").value.length;
            var dept = document.getElementById("userdeptinputbox").value.length;
            var role = document.getElementById("userroledropdown").value;
            var url = "support/mailexists.php?key="+key+"&mail="+mail;
            var xmlHttp = new XMLHttpRequest();
            var req = new XMLHttpRequest();
            req.responseType = "json";
            req.open("GET", url, true);
            req.onload  = function() {
               var jsonResponse = req.response;
               var used = jsonResponse.amount;
               if (used == 0 && maillen > 0){
                 $("#mailinputbox").css("border", "green 2px solid");
               } else {
                 $("#mailinputbox").css("border", "red 2px solid");
               }

               if (used == 0 && fn > 0 && ln > 0 && dept > 0 && role != "" && maillen > 0){
                 // all fields are propagated and mail is not used
                 $(".form-submit-button").prop("disabled", false);
               } else {
                 //incomplete input and/or used mail
                 $(".form-submit-button").prop("disabled", true);
               }
            };
            req.send(null);
          }
        </script>

    <form class="" action="insert.php" method="post" id="create_new_user">
      <div class="new_user_inputbox">
        <div><label for"mail">E-mail</label></div>
        <div><input name="mail" type="text" class="input-field" onchange="check()" id="mailinputbox"></div>
      </div>
      <div class="new_user_inputbox">
        <div><label for"name">First name</label></div>
        <div><input name="name" type="text" class="input-field" onchange="check()" id="userfninputbox"></div>
      </div>
      <div class="new_user_inputbox">
        <div><label for"surname">Last name</label></div>
        <div><input name="surname" type="text" class="input-field" onchange="check()" id="userlninputbox"></div>
      </div>
      <div class="new_user_inputbox">
        <div><label for"dept">Department</label></div>
        <div><input name="dept" type="text" class="input-field" onchange="check()" id="userdeptinputbox"></div>
      </div>
      <div class="new_user_inputbox">
        <div><input type="submit" name="create_user" value="add user" class="form-submit-button"></div>
      </div>
    </form>

    <select name="rolelist" form="create_new_user" onchange="check()" id="userroledropdown">
      <option value="" disabled selected>Role</option>
      <option value="admin">Administrator</option>
      <option value="renter">Renter</option>
      <option value="disabled">Disabled</option>
      <option value="landlord">Landlord</option>
    </select>
    <script type="text/javascript">
       check()
    </script>
  </body>
</html>
