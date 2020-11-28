<nav>
  <div class="wrapper">
    <h1><a href="index.php">LOGO</a></h1>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="blog.php">Find Blogs</a></li>
      <?php 
            if(isset($_SESSION['userid'])){
              echo " <li><a href='signup.php'>Hi <a href='profile.php' style='text-decoration:underline;color:skyblue'>".$_SESSION['username']."</a></li>";
              echo "<li><a href='include/logout.inc.php'>Log Out</a></li>";
            }else{
              echo " <li><a href='signup.php'>Sign Up</a></li>";
              echo "<li><a href='login.php'>Log In</a></li>";

            }
          ?>
    </ul>
    <div class="clear"></div>
  </div>
</nav>