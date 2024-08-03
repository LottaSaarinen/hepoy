<?php

  require_once HELPERS_DIR . 'DB.php';
  function haeTilaus($idhenkilo,$idtarvike) {
    return DB::run('SELECT * FROM tilaus WHERE idhenkilo = ? AND idtarvike = ?',
                   [$idhenkilo, $idtarvike])->fetchAll();
  }
  
   
  function lisaaTilaus($idhenkilo,$idtarvike) {
    DB::run('INSERT INTO tilaus (idhenkilo, idtarvike) VALUES (?,?)',
            [$idhenkilo, $idtarvike]);
    return DB::lastInsertId();
  }

  function poistaTilaus($idhenkilo, $idtarvike) {
    return DB::run('DELETE FROM tilaus  WHERE idhenkilo = ? AND idtarvike = ?',
                   [$idhenkilo, $idtarvike])->rowCount();
  }

  
?>
?>