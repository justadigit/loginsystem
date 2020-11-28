<?php
  include_once "header.php";
?>
<?php include_once "navbar.php" ?>
<div class="wrapper">
  <section class="sign-up">
    <h2>Sign Up</h2>
    <form action="include/signup.inc.php" method="post">
      <input type="text" name="name" placeholder="Full Name ...">
      <input type="email" name="email" placeholder="Email ...">
      <input type="text" name="uid" id="uid" placeholder="UserName...">
      <input type="password" name="pwd" id="pwd" placeholder="Password...">
      <input type="password" name="repeatpwd" id="repeatpwd" placeholder="Repeat Passoword...">
      <button type="submit" name="submit">Sign Up</button>
    </form>
    <?php 
      if(isset($_GET['error'])){
        switch($_GET['error']){
          case "emptyinput":
                echo "<p style='color:red;font-weight:bold'>Please fill all fields!</p>";
          break;
          case "invalidUid":
            echo "<p style='color:red;font-weight:bold'>Chose a proper Username!</p>";
          break;
          case "invalidEmail":
            echo "<p style='color:red;font-weight:bold'>Please enter valid email!</p>";
          break;
          case "usertaken":
            echo "<p style='color:red;font-weight:bold'>User name already taken!</p>";
          break;
          case "passwordsnotmatch":
            echo "<p style='color:red;font-weight:bold'>Passwords not Match!</p>";
          break;
          case "none":
            echo "<p style='color:green;font-weight:bold'>You have Signed Up!</p>";
          break;


        }
      }
    ?>
  </section>
</div>

<?php include_once "footer.php" ?>