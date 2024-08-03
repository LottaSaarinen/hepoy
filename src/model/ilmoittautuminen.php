<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeIlmoittautuminen($idhenkilo,$idtapahtuma) {
    return DB::run('SELECT * FROM mukaan WHERE idhenkilo = ? AND idtapahtuma = ?',
                   [$idhenkilo, $idtapahtuma])->fetchAll();
  }
 
  function lisaaIlmoittautuminen($idhenkilo,$idtapahtuma) {
    DB::run('INSERT INTO mukaan (idhenkilo, idtapahtuma) VALUES (?,?)',
            [$idhenkilo, $idtapahtuma]);
    return DB::lastInsertId();
  }

  function poistaIlmoittautuminen($idhenkilo, $idtapahtuma) {
    return DB::run('DELETE FROM mukaan  WHERE idhenkilo = ? AND idtapahtuma = ?',
                   [$idhenkilo, $idtapahtuma])->rowCount();
  }

function haeIlmoittautumiset() {
    return DB::run('SELECT * FROM mukaan;',)->fetchAll();
  }
?>
