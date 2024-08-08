<?php

  require_once HELPERS_DIR . 'DB.php';

  function lisaaViesti($nimi,$email,$viesti) {
    DB::run('INSERT INTO viesti (nimi, email, viesti) VALUES  (?,?,?);',[$nimi,$email,$viesti]);
    return DB::lastInsertId();
  }