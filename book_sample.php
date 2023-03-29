<?php // https://github.com/RobinNixon/lpmj6/blob/master/18/02.php

  if (isset($_POST['id'])) {
    $id = SanitizeString($_POST['id']);
    $img_path = "samples/$id.jpg";
    echo "<img src=\"$img_path\">";
    } else {
      echo "No sample could be found.";
    }
  
  function SanitizeString($var)
  {
    $var = strip_tags($var);
    $var = htmlentities($var);
    return stripslashes($var);
  }
?>