<?php
  $ruta = htmlspecialchars(utf8_decode($_POST['ruta']));

  if(unlink("../".$ruta)){

    echo "1";
  }
  else{
    echo "2";
  }
?>
