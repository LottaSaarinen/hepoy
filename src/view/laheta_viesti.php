<?php $this->layout('template', ['title' => 'Lähetä viesti'])

?>
<?php

if (!$loggeduser) {
  echo " <br><br> 
<h1>Luo tili tai kirjaudu sisään niin voit lähettää viestin</h1><a href='lisaa_tili'> Voit luoda tilin TÄSTÄ</a>";
}
?>

<div class="info">
 <br><hr><hr><br>
</div>


<form action='viesti' method="POST">

<div>

    <label>Nimi:</label>
    <input id="nimi" name="nimi">
  </div>
  <div>
  <label>Sähköposti:</label>
  <input type="email" name="email">
</div>
  <div>
 
  <label for="viesti">Viestisi:</label>
  <input id="viesti" type="text"  textarea rows=20 cols=40% widht="auto"  name="viesti">
  

 
    <input type="submit" name="lahetaviesti" value="Lähetä">
  </div>
  <br><br>
