<?php

  require_once HELPERS_DIR . 'DB.php';

 // function haeKiinnostus($idhenkilo,$idhevonen) {
   
  function haeKiinnostus($idhenkilo,$idhevonen) {
    return DB::run('SELECT * FROM kiinnostus WHERE idhenkilo = ? AND idhevonen = ?',[$idhenkilo,$idhevonen])->fetch();
          
  }

  function lisaaKiinnostus($idhenkilo,$idhevonen) {
    DB::run('INSERT INTO kiinnostus (idhenkilo, idhevonen) VALUES (?,?)',
            [$idhenkilo,$idhevonen]);
    return DB::lastInsertId();
  }

  function poistaKiinnostus($idhenkilo,$idhevonen) {
    return DB::run('DELETE FROM kiinnostus  WHERE idhenkilo = ? AND idhevonen = ?',
                   [$idhenkilo, $idhevonen])->rowCount();
  }

  
 function haeKiinnostukset() {
    return DB::run('SELECT * FROM kiinnostus;')->fetchAll();
  }
  function haeKiinnostuminen($id) {
    return DB::run('SELECT * FROM kiinnostus WHERE idhevonen = ?;',[$id])->fetch();
  }


  
?>