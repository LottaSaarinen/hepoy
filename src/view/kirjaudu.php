<?php $this->layout('template', ['title' => 'Kirjautuminen']) ?>

<h1>Kirjautuminen</h1>

<div class="info">
  Jos sinulla ei ole vielä tunnuksia, niin voit luoda ne <a href="lisaa_tili">TÄSTÄ</a>.<br>
  Jos olet unohtanut salasanasi, niin voit vaihtaa sen <a href="tilaa_vaihtoavain">TÄSTÄ</a>.<br><br><br>
</div>


<form action="https://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" method="POST">
    
  <div>
    <label>Sähköposti:</label>
    <input type="text" name="email">
  </div>
  <div>
    <label>Salasana:</label>
    <input type="password" name="salasana">
  </div>
  <div class="error"><?= getValue($error,'virhe'); ?></div>
  <div>
    <input type="submit" name="laheta" value="Kirjaudu">
  </div>
  <br><br><hr><hr><br>

  <?php
 echo "➕Ganstagram terveiset Pariisista API:n välityksellä<br>";

 $ch =curl_init();

 curl_setopt($ch, CURLOPT_URL, 'https://neutroni.hayo.fi/~lsaarinen/be/vieraskirja/esimerkki.php' );
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $server_response = curl_exec($ch);

 curl_close($ch);

 $server_response = json_decode($server_response);

 echo "<pre>";print_r($server_response);echo "</pre";


