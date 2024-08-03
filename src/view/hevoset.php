

<?php $this->layout('template', ['title' => 'Myyntihevoset']) ?>

<h1>Myyntihevosemme</h1>


<?php

foreach ($hevoset as $hevonen) {
  
    echo "<div><img src= $hevonen[kuva]></div>";
    echo "<div><h1>$hevonen[nimi]</h1></div>";
    echo "<div><a href='hevonen?id=" . $hevonen['idhevonen'] . "'>Lue lisää hevosesta tästä</a></div>";
    echo "<br><hr><hr><br>";
}
?>
</div>