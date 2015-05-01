<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
// redirect code from http://eecs.oregonstate.edu/ecampus-video/player/player.php?id=66
session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  $_SESSION = array();
  session_destroy();
  $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
  $filePath = implode('/', $filePath);
  $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
  header("Location: {$redirect}/login.php", true);
  //echo "Session killed";
  die();
}
if(!isset($_SESSION['visits'])) {
  $_SESSION['visits'] = -1;
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Login</title>
 </head>
 <body>
   <h1>Login !</h1>
   <form action=
   <?php
   $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
   $filePath = implode('/', $filePath);
   $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
   echo $redirect . "/content1.php";
   ?>
  method="post">
      Username: <input type="text" name="username"><br>
      <input type="submit">
      <input name="flag" value="1" style="display:none">
  </form>
   <?php

   ?>
</body>
</html>
