<?php $this->layout('template', ['title' => 'Lähetä viesti'])

?>
<?php
/*<div>

<label>Nimi:</label>
<input id="nimi" name="nimi">
</div>
<div>
<label>Sähköposti:</label>
<input type="email" name="email">
</div>
  <label for="viesti">Viestisi:</label>
  <input id="viesti" type="text"  textarea rows="20" cols="40" widht="auto"  name="viesti">*/
if (!$loggeduser) {
  echo " <br><br> 
<h1>Luo tili tai kirjaudu sisään niin voit lähettää viestin</h1><a href='lisaa_tili'> Voit luoda tilin TÄSTÄ</a><br><a href='kirjaudu'> Voit kirjautua TÄSTÄ</a>";
}
?>

 <br><hr><hr><br>
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
