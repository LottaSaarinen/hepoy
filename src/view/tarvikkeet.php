
<?php

$this->layout('template', ['title' => '🐎HepOy Ratsutarvikemyymälä']) ?>


<br><br><h>Tilaa 🐎HepOy Ratsutarvikkeet sekä rehut verkosta ja hae tai sovi postitus Helsingin myymälästä Ruskeasuolta</h><br><br>
<hr><hr>
<br><br>

<?php

foreach ($tarvikkeet as $tarvike) {
  
    echo "<h><div><img src= $tarvike[kuva]></div>";
    echo "<h1>$tarvike[nimi]<br></h1>";
    echo "<h>Tuotteen koko $tarvike[koko]</h><br>";
    echo "<h>Tuotteen hinta $tarvike[hinta]€ </h>";
    
    echo "<div><a href='tarvike?id=" . $tarvike['idtarvike'] . "'><br><h>Tilaa klikkaamalla tätä</h></a></div>";
    echo "<br><hr><hr><br>";
}


?>
