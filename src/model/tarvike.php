<?php

require_once HELPERS_DIR . 'DB.php';

function haeTarvikkeet() {
  return DB::run('SELECT * FROM tarvikkeet  ORDER BY hinta desc;')->fetchAll();
}
function haeTarvike($id) {
  return DB::run('SELECT * FROM tarvikkeet WHERE idtarvike = ?;',[$id])->fetch();
}