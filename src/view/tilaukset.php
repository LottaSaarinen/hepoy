<?php $this->layout('template', ['title' => 'Ylläpito ']) ?>

<h1>Tilaukset Ratsutarvikekaupasta</h1>


  
<?php

  foreach ($tilaukset as $rivi) {
  
    echo "<table>";
    echo "<tr>";
    echo "<th>Tilauksen aika</th>";
    echo "<th>ID Henkilö</th>";
    echo "<th>ID Tuote</th>";
    echo " </tr>";
               
    echo "<tr>";
    echo "<td>$rivi[aika]</td>";
    echo "<td>$rivi[idhenkilo]</td>";
    echo "<td>$rivi[idtarvike]</td>";
    echo "</tr>";
    echo "</table>";
    }
