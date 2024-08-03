<?php

  require_once HELPERS_DIR . 'DB.php';
  /*function lisaaViesti($nimi,$email,$viesti) {
    DB::run('INSERT INTO viesti  (idviesti,nimi,email,viesti,aika)  VALUES (default,?,?,?,now());',
            [$nimi,$email,$viesti]);
    return DB::lastInsertId();
  }*/
  function lisaaViesti($idhenkilo,$viesti) {
    DB::run('INSERT INTO viesti (idhenkilo, viseti) VALUES (?,?)',
            [$idhenkilo, $viesti]);
    return DB::lastInsertId();
  }
  function haeViesti($id) {
    return DB::run('SELECT * FROM viesti WHERE idviesti = ?;',[$id])->fetch();
                  
  }

  function haeViestit() {
    return DB::run('SELECT * FROM viesti;')->fetchAll();
  }

 /* function lisaaViestit($idhenkilo,$idviesti) {
    DB::run('INSERT INTO viesti (idhenkilo, idviesti,nimi, email,viesti,aika) VALUES (default,?,?,?,now());',
            [$idhenkilo, $idviesti]);
    return DB::lastInsertId();
  }*/
?>