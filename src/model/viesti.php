<?php

require_once HELPERS_DIR . 'DB.php';
/*function lisaaViesti($nimi,$email,$viesti) {
  DB::run('INSERT INTO viesti  (idviesti,nimi,email,viesti,aika)  VALUES (default,?,?,?,now());',
          [$nimi,$email,$viesti]);
  return DB::lastInsertId();
}*/
function lisaaViesti($nimi,$email,$viesti) {
  DB::run('INSERT INTO viesti (nimi,email,viesti) VALUES (?,?,?)',
          [$nimi,$email,$viesti]);
          return DB::lastInsertId();

}
function lisaaViesteja($idhenkilo,$viesti) {
  DB::run('INSERT INTO viesti (idhenkilo, viesti) VALUES (?,?)',
          [$idhenkilo,$viesti]);
          return DB::lastInsertId();
}/*

  require_once HELPERS_DIR . 'DB.php';

  function lisaaViesti($idhenkilo,$nimi,$email,$viesti) {
    DB::run('INSERT INTO viesti (idhenkilo,nimi,email,viesti) VALUES (?,?,?,?)',
            [$idhenkilo,$nimi,$email,$viesti]);
   
  }
  function haeViesti($id) {
    return DB::run('SELECT * FROM viesti WHERE idviesti = ?;',[$id])->fetch();
                  
  }

  function haeViestit() {
    return DB::run('SELECT * FROM viesti;')->fetchAll();
  }


?>