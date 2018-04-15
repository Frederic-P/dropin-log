

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verification in progress...</title>
    <link rel="stylesheet" href="css/master.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/clock.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/passchecker.js"></script>
  </head>
  <body onload="time()">
    <div class="welcomebody">
    <div class="mainbar">
      <div class="mainbar_filler">

      <div class="logocontainer">
        <a href="index.php"> <img src="images/logo.jpg" alt="logo" class="logo"> </a>
      </div>
      <div id="datetime">

      </div>
      <div class="system_title">
        <h1>User verification form</h1>
      </div>
    </div>
  </div>

    <?php
    session_start();
    $user_db = new PDO("sqlite:databases/users.db") or die ("Can't connect to the database");
    ?>
    <div class="background_overlay">
      <div class="content">
        <h2>Hello</h2>
        <p>Your administrator has set up an account for you. Please provide the following details. These details are only visible to people who have an account on this site. </p>
        <br>
        <p>The e-mail you received contained a one-time alphanumerical authentication-string; you'll need it to verify your invite. Contact your administrator if you've lost your invite-code or haven't received any e-mails.</p>

        <form class="" action="verification.php" method="post">
          <table>
            <tr>
              <td>Invitation code: </td>
              <td><input type="text" name="invite" value="" required></td>
            </tr>
            <tr>
              <td>Choose <a href="#policy">password</a>: </td>
              <td><input type="password" name ="your_password" value= "" required id="pass1" onchange="verify(1)"> <span class="indicate" id="indicate_1"></span></td>
            </tr>
            <tr>
              <td>Retype password: </td>
              <td><input type="password" name ="your_password2" value= "" required id="pass2" onchange="verify(2)"> <span class="indicate" id="indicate_2"></span></td>
            </tr>
          </table>

        </form>
        <br>
        <br>
        <br>
        <h2 id="policy">Password Polidy</h2>
        <div>
          Passwords should be over 8 characters and contain at least one number and capital letter.
          Passwords on this site are encrypted using <a href="https://www.quora.com/Why-is-SHA512-hash-considered-secure" target="_blank"> SHA512</a> and <a href="https://en.wikipedia.org/wiki/Salt%20(cryptography)" target="_blank">prepended and appended</a> with salts to deter collision attacks.
          After 5 consecutive unsuccessfull logins your account gets suspended to prevent brute-force-attacks.
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
