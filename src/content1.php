<?php
// redirect if no post
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
$redirectPath =  $redirect . "/login.php";

session_start();

// take care of first visit where they come by post
if(isset($_POST) && $_POST['flag'] == 1) {
  $_SESSION['flag'] = 1;
}
// redirect
if($_SESSION['flag'] != 1 || !$_SESSION['flag']) {
  header("Location: {$redirectPath}", true);
}

error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Content 1</title>
 </head>
 <body>
   <h1>Content 1 !</h1>

   <?php

   if (session_status() == PHP_SESSION_ACTIVE) {
     // they're either returning from page 2 or
     // check for null username
     if((isset($_POST['username']) && $_POST['username'] == "") || (isset($_POST['username']) && $_POST['username'] == null)) {
       $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
       $filePath = implode('/', $filePath);
       $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
       $redirecPath =  $redirect . "/login.php";
       echo '<h3>' . "A username must be entered. Click " . '<a href="' . $redirecPath  . '">here' . '</a>' . " to return to the login screen." . '</h3>';
     } else { // end check for null or empty username
       if(isset($_POST['username']) && $_POST['username'] != null) {
         $_SESSION['username'] = $_POST['username'];
       }
       if(!isset($_SESSION['visits']) || $_SESSION['visits'] == -1) {
         $_SESSION['visits'] = 0;
       }

       $redirecPath =  $redirect . "/login.php?action=logout";
       echo '<h3>' . "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times before. Click " . '<a href="' . $redirecPath  . '">here' . '</a>' . " to logout." . '</h3>';
       $redirectPath = $redirect ."/content2.php";
       echo '<a href="' . $redirectPath  . '">Content Page 2' . '</a>';
       $_SESSION['visits']++;
     } // end else
   }
   ?>
</body>
</html>
