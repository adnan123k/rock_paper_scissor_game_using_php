<?php
if(isset($_POST['cancel'])){
    header("Location: index.php");
    return;
}
$f=false;
if(isset($_POST['who'])&& isset($_POST['pass'])){
if(strlen($_POST['who'])<1 && strlen($_POST['pass'])<1)
$f="User name and password are required";
elseif(strlen($_POST['who'])<1)
$f="User name and password are required";
elseif(strlen($_POST['pass'])<1)
$f="User name and password are required";
else {
   $ps=hash("md5","php123");
   if(hash("md5",$_POST['pass'])==$ps){
       header("Location: game.php?who=".urlencode($_POST['who']));
       return;
   }
   else {
       $f="Incorrect password";
   }
}}
?>
<!DOCTYPE html>
<html>
<head><title>MHD ADNAN AL KHARFAN login</title><meta charset="UTF-8"></head>
<body>
<h1>Please Log In</h1><?php
if($f!==false)
echo ('<p style="color:  red;">'.htmlentities($f)."</p>\n");
?>
<form action="" method="post">
<label for="who">User Name </label>
<input type="text" name="who" ><br><label for="pass">Password </label>
<input type="password" name="pass" ><br>
<input type="submit" name="login" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form></body></html>