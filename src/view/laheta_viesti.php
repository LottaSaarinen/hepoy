<?php $this->layout('template', ['title' => 'Viesti'])

?>

<h1>Lähetä viesti</h1>

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
  <input id="viesti" type="text" name="viesti">
  

 
    <input type="submit" name="lahetaviesti" value="Lähetä">
  </div>
  <br><br>
