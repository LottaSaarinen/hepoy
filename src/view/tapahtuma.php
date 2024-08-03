<?php $this->layout('template', ['title' => $tapahtuma['nimi']]) ?>



<br>
<h> Yritys 🐎HepOy järjestää ratsastuskilpailuita, hieroo hevosia eri maakunnissa sekä jäljestää hevosaiheisia tapahtumia</h>
<br><br>'
<?php

if (!$loggeduser) {
  echo " <hr><hr><br><h2> Luomalla tilin pääset ilmottautumaan tapahtumiin.<a href='lisaa_tili'> Voit luoda tilin TÄSTÄ</a>.<br><br>";
}
  
?><hr><hr><br><br>

<?php

  $start = new DateTime($tapahtuma['tap_alkaa']);
 
  $end = new DateTime($tapahtuma['ilm_loppuu']);
?>
<div>
<div><h2><?=$tapahtuma['nimi']?></h2></div><br>
<div><?=$tapahtuma['kuvaus']?></div>
<div>Tapahtuma pidetään <?=$start->format('j.n.Y') ." alkaen klo " . $start->format('G:i') . " ja tapahtuma loppuu " . $end->format('j.n.Y') ?></div>
<div>Ilmottautumien loppuu: <?=$end->format('j.n.Y G:i')?></div>
<br><br><br></div>

<?php
if ($loggeduser) {
    if (!$ilmoittautuminen) {
     echo "<div class='flexarea'><a href='ilmoittaudu?id=$tapahtuma[idtapahtuma]' class='button'>ILMOITTAUDU</a></div>";     
    } else {
      echo "<div class='flexarea'>";
      echo "<div>Olet ilmoittautunut tapahtumaan!</div><br><br>";
      echo "<a href='peru?id=$tapahtuma[idtapahtuma]' class='button'>PERU ILMOITTAUTUMINEN</a>";
      echo "</div>";
    }
  }
  ?>
