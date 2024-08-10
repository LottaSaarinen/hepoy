<?php $this->layout('template', ['title' => 'Lähetä viesti'])

?>
<?php

if (!$loggeduser) {
  echo " <br>
<h><b>Luo tili tai kirjaudu sisään niin voit lähettää viestin</h><br><a href='lisaa_tili'> Voit luoda tilin TÄSTÄ</a><br><a href='kirjaudu'> Voit kirjautua TÄSTÄ</a><b>";
}
?>

 <br><br><br><hr><hr><br><br><br>
</div>


<form action='viesti' method="POST">


  <div>
    <label for="viesti">Viesti:</label>
       <input id="viesti" type="text" name="viesti" value="<?= getValue($formdata,'viesti') ?>">
    <div class="error"><?= getValue($error,'viesti'); ?></div>

  </div>
  

 
    <input type="submit" name="lahetaviesti" value="Lähetä">
  </di>
  <br><br>
