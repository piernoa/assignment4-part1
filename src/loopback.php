<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Loop Back</title>
 </head>
 <body>
   <h1>Loop Back !</h1>
   <?php
   if ($_SERVER['REQUEST_METHOD']== "POST") {
     echo "post is happening";
   }

    class toEncode {
      private $Type = "";
      private $parameters = array();
      public function pushIt($key, $value) {
        $this->parameters[$key]  = $value;
      }
      public function printIt() {
        foreach($parameters as $key => $value) {
           echo "$key : $value" . '<br>';
        }
      }
      public function encodeIt() {
        return '{' . "\"Type\"".':' . json_encode($this->Type) . ', ' . "\"parameters\"". ':' . json_encode($this->parameters) . '}';
      }
      public function setType($type) {
        $this->Type = $type;
      }
      public function setNull() {
        $this->parameters = null;
      }
    }

    $toEncodeVar = new toEncode();

    // was it a post or a get?
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      $request = $_GET;
      $toEncodeVar->setType('GET');
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
      $request = $_POST;
      $toEncodeVar->setType('POST');
    }

    if (empty($request)) {
      $toEncodeVar->setNull();
    } else {
      foreach($request as $key => $value) {
        if (!$value) {
          $value = 'undefined';
        }
        $toEncodeVar->pushIt($key, $value);
      }
    }
     echo '<h3>Your beautiful JSON string</h3> <br>';
     echo $toEncodeVar->encodeIt();
   ?>


</body>
</html>
