<?php
  include_once "header.php";
?>
<?php include_once "navbar.php" ?>
<div class="wrapper">
  <section class="log-in">
    <h2>Log In</h2>
    <form action="include/login.inc.php" method="post">
      <input type="text" name="uid" id="uid" placeholder="UserName/Email...">
      <input type="password" name="pwd" id="pwd" placeholder="Password...">
      <button type="submit" name="submit">Log In</button>
    </form>

    <?php 
      if(isset($_GET['error'])){
        if($_GET['error']=='wronglogin'){
          echo "<p style='color:red;font-weight:bold'>User name / email or password you enter is incorrect!</p>";
        }
      }
    ?>
  </section>
</div>

<?php include_once "footer.php" ?>