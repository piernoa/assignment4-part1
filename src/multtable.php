<?php
error_reporting(E_ALL);
ini_set('displa_errors', 'On');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Mult Table</title>
 </head>
 <body>
   <h1>Multiplication Table !</h1>
   <?php
   $minMaxFlag = true;
  if (isset($_GET['min-multiplicand'])) {
    $minMultiplicand = intval($_GET['min-multiplicand']);
    if (!is_numeric($_GET['min-multiplicand']) || $_GET['min-multiplicand'] < 0) {
      echo "min-multiplicand must be an integer." . '<br>';
      $minMultiplicand = null;
    }
  } else {
    echo "Missing parameter: min-multiplicand." . '<br>';
  }

  if (isset($_GET['max-multiplicand'])) {
    $maxMultiplicand = intval($_GET['max-multiplicand']);
    if (!is_numeric($_GET['max-multiplicand']) || $_GET['max-multiplicand'] < 0) {
      echo "max-multiplicand must be an integer." . '<br>';
      $maxMultiplicand = null;
    }

  } else {
    echo "Missing parameter: max-multiplicand." . '<br>';
  }

  if (isset($_GET['min-multiplier'])) {
    $minMultiplier = intval($_GET['min-multiplier']);
    if (!is_numeric($_GET['min-multiplier']) || $_GET['min-multiplier'] < 0) {
      echo "min-multiplier must be an integer." . '<br>';
      $minMultiplier = null;
    }

  } else {
    echo "Missing parameter: min-multiplier." . '<br>';
  }

  if (isset($_GET['max-multiplier'])) {
    $maxMultiplier = intval($_GET['max-multiplier']);
    if (!is_numeric($_GET['max-multiplier']) || $_GET['max-multiplier'] < 0) {
      echo "max-multiplier must be an integer." . '<br>';
      $maxMultiplier = null;
    }

  } else {
    echo "Missing parameter: max-multiplier." . '<br>';
  }

   // check if min multiplicand < max multiplicand
   if ($minMultiplicand >= $maxMultiplicand && ($minMultiplicand !== null) && ($maxMultiplicand !== null)) {
    echo "Minimum multiplicand larger than maximum." . '<br>';
    $minMaxFlag = false;
  }

   // check if min multiplier < max multiplier
  if ($minMultiplier >= $maxMultiplier && ($minMultiplier !== null) && ($maxMultiplier !== null)) {
    echo "Minimum multiplier larger than maximum." . '<br>';
    $minMaxFlag = false;
  }


  if ( isset($_GET['min-multiplier']) &&
      isset($_GET['max-multiplier']) &&
      isset($_GET['min-multiplicand']) &&
      isset($_GET['max-multiplicand']) &&
      ($minMultiplicand !== null) &&
      ($minMultiplier !== null) &&
      ($maxMultiplicand !== null) &&
      ($maxMultiplier !== null) &&
      $minMaxFlag) {
  // create multiplication table
  echo '<table>';
  $plier = intval($minMultiplier);
  $cand = intval($minMultiplicand);

    for ($i=0; $i<($maxMultiplicand-$minMultiplicand + 2); $i++) {
      echo '<tr>';
      for ($j=0; $j<($maxMultiplier-$minMultiplier + 2); $j++) {
        $plier = $minMultiplier+$j-1;
        if ($i == 0 && $j == 0) {
          echo '<td style="border: 1px solid #505050"> </td>';
        } else if ($i == 0) {
          $temp = $minMultiplier+$j-1;
          $plier = $temp-1;
          echo '<td style="border: 1px solid #505050">'. $temp . '</td>';
        } else if ($j==0){
          $temp = $minMultiplicand+$i-1;
          $cand = $temp;
          echo '<td style="border: 1px solid #505050">'. $temp . '</td>';
        } else {
          echo '<td style="border: 1px solid #505050">'. $cand*$plier .'</td>';
          $plier++;
        }


      }
      echo '</tr>';
    }
    echo '</table>';
  }  else {
    echo '<h2>There were some errors! Check above to fix them and see the amazing multiplication calculator.</h2>';
  }// end is set if statement

  ?>


</body>
</html>
