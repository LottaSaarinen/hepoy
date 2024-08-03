<?php $this->layout('template', ['title' => 'Kirjautuminen']) ?>

<h1>Viestisi on lähetty. Vastaamme sähköpostiosoitteeseenne mahdollisimman pian.</h1>
<?php


$dsn = "mysql:host=localhost;" .
"dbname={$_SERVER['DB_DATABASE']};" .
"charset=utf8mb4";
$user = $_SERVER['DB_USERNAME'];
$pass = $_SERVER['DB_PASSWORD'];
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];

try {
  $yht = new PDO($dsn, $user, $pass, $options);
  $nimi = $_POST['nimi'] ;
  $email = $_POST['email'] ;
  $viesti = $_POST['viesti'] ;

  if  ( !empty($email) || !empty($viesti)) { 
 
  $lisaa= ("INSERT INTO viesti
  (idpyynto,nimi,email,viesti,aika)
  VALUES (default,?,?,?,now())"); 

$lause = $yht->prepare($lisaa);

$lause->execute([$nimi,$email,$viesti]); 
$id = $yht->lastInsertId(); 
unset($nimi);
unset($email); 
unset($viesti);

} 



} catch (PDOException $e) {
$e->getMessage();
}
$dsn = "mysql:host=localhost;" .
"dbname={$_SERVER['DB_DATABASE']};" .
"charset=utf8mb4";
$user = $_SERVER['DB_USERNAME'];
$pass = $_SERVER['DB_PASSWORD'];
$options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];


try {
  $yht= new PDO($dsn, $user, $pass, $options);
  if (!$yht) echo $e->getmessage();


  $stmt = $yht->query(" SELECT idviesti, nimi, email,viesti,aika FROM viesti"); 
 while ($rivi = $stmt->fetch()) {


  echo " <span><table></span>" ;

  echo "   <th> Nimi</th>" ;
    echo "  <th> Email</th>" ;
    echo "  <th> Viesti</th>" ;
    echo "  <th> Lähetetty</th>" ;


    echo "<tr>" ;
    echo "  <td>$rivi[nimi]</td>" ;
 
    echo " <td>$rivi[email]</td>" ;
    echo "  <td>$rivi[viesti]</td>" ;
    echo " <td>$rivi[aika]</td>" ;

    echo "</tr>" ;
    echo "</table> " ;
    echo " <br><br>";


   } 

}
catch (PDOException $e)
{
  echo $e->getMessage();

}

?><?php

function lisaaViesti($formdata, $baseurl='') {


  require_once(MODEL_DIR . 'viestit.php');

 
  $error = [];

  $forbidden = array('CREATE','DELETE','DROP',
    'TRUNCATE','TRUNC','INSERT','UPDATE','COPY','GRANT','REVOKE'
    ,'PROCEDURE','FUNCTION','RETURNS','SRC','HREF','=');

  
  if (!isset($formdata['nimi']) || !$formdata['nimi']) {
    $error['nimi'] = "Anna nimesi.";
  } else {
    if (!preg_match("/^[- '\p{L}]+$/u", $formdata["nimi"])) {
      $error['nimi'] = "Syötä nimesi ilman erikoismerkkejä.";
    }
  }

  
  if (!isset($formdata['email']) || !$formdata['email']) {
    $error['email'] = "Anna sähköpostiosoitteesi.";
  } else {
    if (!filter_var($formdata['email'], FILTER_VALIDATE_EMAIL)) {
      $error['email'] = "Sähköpostiosoite on virheellisessä muodossa.";
    } 
    }
  }

  if (empty($formdata['viesti']) || $forbidden['viesti']){
    $error['viesti'] = "Viestissä on kiellettyjä sanoja tai erikoismerkkejä";
    } 
    
  

 


  if (!$error) {

    $email = $formdata['email'];
    $viesti = $viesti['viesti'];

    $idviesti = lisaaViesti($email,$viesti);

  }
  


?>