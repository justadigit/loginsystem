<?php 
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $repeatpwd = $_POST['repeatpwd'];
    
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyInputSignup($name,$email,$username,$pwd,$repeatpwd) !==false){
        header("location:../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !==false){
      header("location:../signup.php?error=invalidUid");
      exit();
    }
    if(invalidEmail($email)!==false){
      header("location:../singup.php?error=invalidEmail");
      exit();
    }
    if(pwdMatch($pwd,$repeatpwd)!==false){
      header("location:../signup.php?error=passwordsnotmatch");
      exit();
    }
    if(uidExists($conn,$username,$email)!==false){
      header('location:../signup.php?error=usertaken');
      exit();
    }

    createUser($conn,$name,$email,$username,$pwd);

  }else{
    header("location:../signup.php");
    exit();
  }
?>