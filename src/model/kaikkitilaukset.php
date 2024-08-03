
<?php



  require_once HELPERS_DIR . 'DB.php';
  function haeTilaukset() {
    return DB::run('SELECT * FROM tilaus ORDER BY aika desc;')->fetchAll();
  }