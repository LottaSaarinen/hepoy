

<?php

$this->layout('template', ['title' => 'Ohjelma 🐎HepOy24 Weekend']) ?>

<br><br>
<hr><hr><br><br><h>🐎HepOy 2025-Weekend ohjelma julkaistaan vuoden 2025 keväällä tälle sivulle</h><br><br><hr><hr><br><br>

<?php
echo "➕Ganstagram terveiset 🐎HepOy 2024-Weekendistä API:n välityksellä<br>";

$ch =curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://neutroni.hayo.fi/~lsaarinen/be/vieraskirja/toinenesimerkki.php' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_response = curl_exec($ch);

curl_close($ch);

$server_response = json_decode($server_response);

echo "<pre>";print_r($server_response);echo "</pre";


