<?php $this->layout('template', ['title' => $tarvike['nimi']]) ; 
?>

<style>
img { 
height:fit-content;
max-width:60%;
}  
</style>

<table>

<div><?=$tarvike['nimi']?></div>
<div>Hinta <?=$tarvike['hinta']?>€</div>
<div>Koko <?=$tarvike['koko']?></div><br>
<div><img src=<?=$tarvike['kuva']?>></div><br>
</table>

<?php

if (!$loggeduser) {
  echo " <br><br> Luomalla tilin pääset tilaamaan tuotteita.<a href='lisaa_tili'> Voit luoda tilin TÄSTÄ</a>";
}

if ($loggeduser) {
    if (!$tilaus) {
    
echo " <br><br><br>" ;   
echo "<div class='flexarea'><a href='tilaa?id=$tarvike[idtarvike]' class='button'>Tilaa tuote tästä.</a></div>"; 
 
} else {
echo "<div class='flexarea'>";
echo"<br><br>";
echo "<p><div>Olet tehnyt tilauksen. Tuotteet voit hakea varastoltamme Helsingin Ruskeasuolta arkena 10-18 välillä. Voimme myös sopia postituksesta sähköpostitse <a href='laheta_viesti'>TÄÄLTÄ</a>";
echo"<br><br><br><br>";
echo "<a href='perutilaus?id=$tarvike[idtarvike]' class='button'>Peru tilaus</a>";
echo "</div>";

}
  }
    ?>
   