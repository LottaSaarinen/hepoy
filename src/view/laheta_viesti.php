<?php $this->layout('template', ['title' => 'Kirjautuminen'])
 /* <label>Nimi:</label>
  <input type="nimi" name="email">
</div>  
<div>
  <label>Sähköposti:</label>
  <input type="email" name="email">
</div>*/
?>

<h1>Lähetä viesti</h1>

<div class="info">
 <br><hr><hr><br>
</div>


<form action="viestit" method="POST">
<div>
  
  <div>
    <label>Viestisi:</label>
  
  <textarea rows=5 cols=60 name="viesti"></textarea>
  </div>
 
    <input type="submit" name="lahetaviesti" value="Lähetä">
  </div>
  <br><br>
