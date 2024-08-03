<?php $this->layout('template', ['title' => $hevonen['nimi']]) ;

?>

<h1><?=$hevonen['nimi']?></h1><br>
<p1>Sukupuoli <?=$hevonen['sukupuoli']?></p1><br>
<p1>Isä <?=$hevonen['isä']?></p1><br>
<p1>Emä <?=$hevonen['emä']?></p1><br>
<p1>Koulutustaso <?=$hevonen['koulutustaso']?></p1><br>
<p1>Syntymävuosi <?=$hevonen['syntymävuosi']?></div><br>
<p1>Ratsastuslaji <?=$hevonen['ratsastuslaji']?></div><br><br>
<p1><div><img src=<?=$hevonen['kuva']?>></p1><br>

<br>
<br>
<?php
if (!$loggeduser) {
  echo "<br><br>";
  echo "Luomalla tilin, lähetämme sinulle tarkempaa tietoa hevosista.
  <a href='lisaa_tili'> Voit luoda tilin TÄSTÄ</a>.<br><br>";

  }


if ($loggeduser) {

if (!$kiinnostus) {      
echo "<div class='flexarea'><a href='kerrokiinnostuksesi?id=$hevonen[idhevonen]'class='button'>Klikkaa tästä ja kerro kiinnostuksesi hevosesta. Palaamme sinulle sähköpostitse</a></div>";
} else {
echo "<div class='flexarea'>";
echo"<br><br>";
echo "<p><div>Olet kertonut kiinnostuksesi hevosesta, palaamme asiaan sähköpostitse.</div></p>";
echo"<br><br>";
echo "<div class='flexarea'><a href='perukiinnostuksesi?id=$hevonen[idhevonen]' class='button'>Peru kiinnostuksesi hevosesta</a>";
echo "<br><br><br><br>";
echo "</div>";

}
  }
 
    ?>



