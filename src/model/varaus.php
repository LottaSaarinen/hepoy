
<?php



  require_once HELPERS_DIR . 'DB.php';

  function haeIlmoittautumiset() {
    return DB::run('SELECT * FROM mukaan ORDER BY aika desc;')->fetchAll();
  }
 
?>
 

