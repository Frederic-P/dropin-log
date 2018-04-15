<div class="mainbar">
  <div class="mainbar_filler">
    <div class="logocontainer">
    <a href="index.php"> <img src="images/logo.jpg" alt="logo" class="logo"> </a>
  </div>
  <div id="datetime">

  </div>
  <div class="user_credentials">
    <?php
    if (!isset($_SESSION["uid"])){
      echo '
    <form action="" method="post" id="frmLogin">
      <div class="inputbox">
        <div><label for="login">Username</label></div>
        <div><input name="user_name" type="text" class="input-field"></div>
      </div>
      <div class="inputbox">
        <div><label for="password">Password</label></div>
        <div><input name="password" type="password" class="input-field"> </div>
      </div>
      <div class="inputbox">
        <div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
      </div>
    </form>';
  } else {
    echo "Welcome: ". $_SESSION["name"];

    echo '<div class="buttons"><a href="logout.php"><div class="navbutton">Logout</div></a>';
    if ($_SESSION["role"] == "admin") {
      echo '<a href="new_user.php"><div class="navbutton">Add user</div></a>';
      echo '</div>';
    }
  }
     ?>
  </div>
  </div>
</div>
