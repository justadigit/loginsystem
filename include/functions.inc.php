<?php 
  function emptyInputSignup($name,$email,$username,$pwd,$repeatpwd){
    $result="";
    if(empty($name) || empty($email) || empty($username) || empty($pwd)||empty($repeatpwd)){
      $result=true;
    }else{
      $result=false;
    }
    return $result;
  }

  function invalidUid($username){
    $result=null;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
      $result = true;
    }else{
      $result = false;
    }
    return $result;
  }

  function invalidEmail($email){
    $result=null;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $result = true;
    }else{
      $result = false;
    }
    return $result;
  }

  function pwdMatch($pwd,$repeatpwd){
    $result=null;
    if($pwd !== $repeatpwd){
      $result=true;
    }else{
      $result=false;
    }
    return $result;
  }

  function uidExists($conn,$username,$email){
    $result=null;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM users where userUid=? or userEmail = ?;";
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location:../signup.php?error=stmtfailed");
      exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultData)){
      return $row;
      exit();
    }else{
      $result=false;
      return $result;
    }
    mysqli_stmt_close($stmt);
  }

  function createUser($conn,$name,$email,$username,$pwd){
    $stmt = mysqli_stmt_init($conn);
    $sql ="INSERT INTO `users`(`userName`, `userEmail`, `userUid`, `userPwd`) VALUES (?,?,?,?);";
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location:../signup.php?error=stmtfailed");
      exit();
    }
    $hassPassword = password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hassPassword);
    mysqli_stmt_execute($stmt);
    printf("%d Row Inserted.", mysqli_stmt_affected_rows($stmt));
    //close resource
    mysqli_stmt_close($stmt);
    header("location:../signup.php?error=none");
    exit();
  }

  #login

  function emptyInputLogin($uid,$pwd){
    $result;
    if(empty($uid) || empty($pwd)){
      $result=true;
    }else{
      $result=false;
    }
    return $result;
  }

  function userLogin($conn,$uid,$pwd){

   $uidExists =  uidExists($conn,$uid,$uid);
   if($uidExists===false){
      header("location:../login.php?wronglogin");
      exit();
   }
   $hashPwd = $uidExists['userPwd'];
   $pwdVerify = password_verify($pwd,$hashPwd);

   if($pwdVerify===false){  
      header("location:../login.php?wronglogin");
      exit();
   }else if($pwdVerify===true){
      session_start();
      $_SESSION['username'] = $uidExists['userUid'];
      $_SESSION['userid'] = $uidExists['userId'];
      header("location:../index.php");
      exit();
   }
  }

?>