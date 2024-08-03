
<?php $this->layout('template', ['title' => 'Ylläpito']) ?>

<h1>Yhteydenottopyyntö hevosista</h1>


<?php

foreach ($kiinnostukset as $rivi) {
    
    echo "<table>";
    echo "<tr>";
    echo "<th>Pyynnön aika</th>";
    echo "<th>ID Henkilö</th>";
    echo "<th>ID Hevonen</th>";
    echo " </tr>";
               
    echo "<tr>";
    echo "<td>$rivi[aika]</td>";
    echo "<td>$rivi[idhenkilo]</td>";
    echo "<td>$rivi[idhevonen]</td>";
    echo "</tr>";
    echo "</table>";
    }