<?php $this->layout('template', ['title' => 'Tulevat tapahtumat']) ?>

<h1>Tulevat tapahtumat</h1>


<?php

foreach ($tapahtumat as $tapahtuma) {

  $start = new DateTime($tapahtuma['tap_alkaa']);
  $end = new DateTime($tapahtuma['tap_loppuu']);

  echo "<div>";
  echo "<div>$tapahtuma[nimi]</div>";
  echo "<div>" . $start->format('j.n.Y') . "-" . $end->format('j.n.Y') . "</div>";
  echo "<div><a href='tapahtuma?id=" . $tapahtuma['idtapahtuma'] . "'>Lue lisää klikkamalla tästä</a></div>";
  echo "<br><hr><hr><br>";
  echo "</div>";



}

?>

