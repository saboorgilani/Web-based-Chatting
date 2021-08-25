<?php
function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat)
{
    $result;
    if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat))
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
    
}
function invalidUid($username)
{
    $result;
    if(!preg_match(("/^[a-zA-z0-9]*$/"),$username))
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
    
}
/*function invalidEmail($email)
{
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return result;
    
}
*/
function samepwd($pwd,$pwdRepeat)
{
    $result;
    if($pwd!==$pwdRepeat)
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
    
}
function uidexist($conn, $username, $email)
{
    $sql="SELECT * FROM users WHERE usersUid= ? OR usersEmail= ?;";
    //creating prepared statement(intianlizing)
    $stmt=mysqli_stmt_init($conn);
    //checking for errors in statement 
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=statemetnfailed");
          exit();

    }
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultsData=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultsData))
    {
        return $row;
        
    }
    else{
        $result=false;
        return $result;

    }
    mysqli_stmt_close($stmt);
}
function createUser($conn,$name,$email,$username,$pwd)
{
    $sql="INSERT INTO users (usersName, usersEmail, usersUid, userPwd) VALUES (?, ?, ?, ?);";
    //creating prepared statement(intianlizing)
    $stmt=mysqli_stmt_init($conn);
    //checking for errors in statement 
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=statementfailed");
          exit();

    }
    $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$username,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}
function emptyInputlogin($username,$pwd)
{
    $result;
    if(empty($username)||empty($pwd))
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}
function loginUser($conn,$username,$pwd){
   $uidExists=uidexist($conn, $username, $username);
   if($uidExists===false){
       header("location../login.php?error=wronglogininfo");
       exit();
   }
   $pswdHashed=$uidExists["userPwd"];
   $checkpwd=password_verify($pwd,$pswdHashed);
   if($checkpwd===false){
    header("location../login.php?error=wronglogininfo");
    exit();
   }
   else if($checkpwd===true){
       session_start();
       $_SESSION["userid"]=$uidExists["usersID"];
       $_SESSION["useruid"]=$uidExists["usersUid"];
       header("location: ../index.php");
       exit();
   }
}

