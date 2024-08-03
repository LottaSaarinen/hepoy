<?php $this->layout('template', ['title' => 'Ylläpito ']) ?>

<h1>Tapahtumiin Ilmoittautuminen</h1>

<?php
foreach ($varatut as $rivi) {

  echo "<table>";
  echo "<tr>";
  echo "<th>Ilmoittautumisen aika</th>";
  echo "<th>ID Henkilö</th>";
  echo "<th>ID Tapahtuma</th>";
  echo " </tr>";
             
  echo "<tr>";
  echo "<td>$rivi[aika]</td>";
  echo "<td>$rivi[idhenkilo]</td>";
  echo "<td>$rivi[idtapahtuma]</td>";
  echo "</tr>";
  echo "</table>";
  }
