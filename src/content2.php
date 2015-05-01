<?php
// redirect if no post
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
$redirectPath =  $redirect . "/login.php";
// if (!$_SERVER['HTTP_REFERER'] || $_SERVER['HTTP_REFERER'] != $redirectPath) {
//   header("Location: {$redirectPath}", true);
// }


session_start();

// redirect
if(!isset($_SESSION['flag']) || $_SESSION['flag'] != 1) {
  header("Location: {$redirectPath}", true);
}


error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Content 2</title>
 </head>
 <body>
   <h1>Content 2!</h1>
   <h3>This is super secret.</h3>

   <?php
     $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
     $filePath = implode('/', $filePath);
     $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
     $redirectPath =  $redirect . "/content1.php";

     echo '<a href="' . $redirectPath  . '">Back To Content Page 1' . '</a>';
   ?>
</body>
</html>
