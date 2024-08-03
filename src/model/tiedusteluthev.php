
<?php

  require_once HELPERS_DIR . 'DB.php';

function haeKiinnostukset() {
    return DB::run('SELECT * FROM kiinnostus ORDER BY aika desc;')->fetchAll();
  }
?>