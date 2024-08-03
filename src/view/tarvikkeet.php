
<?php

$this->layout('template', ['title' => '🐎HepOy Ratsutarvikemyymälä']) ?>


<br><br><h>Tilaa 🐎HepOy Ratsutarvikkeet sekä rehut verkosta ja hae tai sovi postitus Helsingin myymälästä Ruskeasuolta</h><br><br>
<hr><hr>
<br><br>

<?php
  //echo "<div><a href='satulat'>Satulat➡️</a></div><hr><hr><br><br>";

foreach ($tarvikkeet as $tarvike) {
  
    echo "<div><img src= $tarvike[kuva]></div>";
    echo "<h1>$tarvike[nimi]<br>";
    echo "Tuotteen koko $tarvike[koko]<br>";
    echo" Tuotteen hinta $tarvike[hinta]€ ";
    
    echo "<div><a href='tarvike?id=" . $tarvike['idtarvike'] . "'><br>Tilaa klikkaamalla TÄSTÄ</a></div>";
    echo "<br><hr><hr><br>";
}


?>
