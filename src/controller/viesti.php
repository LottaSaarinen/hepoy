<?php

  require_once HELPERS_DIR . 'DB.php';
  /*function lisaaViesti($nimi,$email,$viesti) {
    DB::run('INSERT INTO viesti  (idviesti,nimi,email,viesti,aika)  VALUES (default,?,?,?,now());',
            [$nimi,$email,$viesti]);
    return DB::lastInsertId();
  }*/
  function lisaaViesti($idhenkilo,$viesti,$nimi,$email) {
    DB::run('INSERT INTO viesti (idhenkilo,nimi,email, viesti) VALUES (?,?,?,?)',
            [$idhenkilo,$nimi,$email,$viesti]);
  
  }