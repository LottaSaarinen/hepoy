<?php

require_once HELPERS_DIR . 'DB.php';

function haeHevoset() {
  return DB::run('SELECT * FROM myyntihevoset  ORDER BY nimi;')->fetchAll();
}

function haeHevonen($id) {
  return DB::run('SELECT * FROM myyntihevoset WHERE idhevonen = ?;',[$id])->fetch();
}


?>