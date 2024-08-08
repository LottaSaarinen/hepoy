<?php

function lisaaViestit($formdata) {


 
  $error = [];

  

  
  if (!isset($formdata['viesti']) || !$formdata['viesti']) {
    $error['viesti'] = "Kirjoita viesti.";
  } else {
    if (!preg_match("/^[- '\p{L}]+$/u", $formdata["viesti"])) {
      $error['viesti'] = "Syötä viesti ilman erikoismerkkejä.";
    }
  }
  
  }


  if (!$error) {

    require_once MODEL_DIR . 'viesti.php';
    $viesti = $formdata['viesti'];

    $idviesti = lisaaViesteja($idhenkilo,$viesti);


    if ($idviesti) {
     
      
 
      
          return [
            "status" => 200,
            "id"     => $idviesti,
            "data"   => $formdata
          ];
        } else {
          return [
            "status" => 500,
            "data"   => $formdata
          ];
        }
    
  
    } else {
  
     
      return [
        "status" => 400,
        "data"   => $formdata,
        "error"  => $error
      ];
  
    }
