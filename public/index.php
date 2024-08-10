
<?php


session_start();


require_once '../src/init.php';
  
  if (isset($_SESSION['user'])) {
    require_once MODEL_DIR . 'henkilo.php';
    $loggeduser = haeHenkilo($_SESSION['user']);
    } else {
    $loggeduser = NULL;
    }

  
  $request = str_replace($config['urls']['baseUrl'],'',$_SERVER['REQUEST_URI']);
  $request = strtok($request, '?');
  $templates = new League\Plates\Engine(TEMPLATE_DIR);


 
     switch ($request) {


case '/':
case '/kirjaudu':
          if (isset($_POST['laheta'])) {
          require_once CONTROLLER_DIR . 'kirjaudu.php';
          if (tarkistaKirjautuminen($_POST['email'],$_POST['salasana'])) {
          require_once MODEL_DIR . 'henkilo.php';
          $user = haeHenkilo($_POST['email']);
          if ($user['vahvistettu']) {
          session_regenerate_id();
          $_SESSION['user'] = $user['email'];
          $_SESSION['admin'] = $user['admin'];
          header("Location:  yritys");
          } else {
          echo $templates->render('kirjaudu', [ 'error' => ['virhe' => 'Tili on vahvistamatta! Ole hyvä, ja vahvista tili sähköpostissa olevalla linkillä.']]);
          }
          } else {
          echo $templates->render('kirjaudu', [ 'error' => ['virhe' => 'Väärä käyttäjätunnus tai salasana!']]);
          }
          } else {
          echo $templates->render('kirjaudu', [ 'error' => []]);
          }
          break;

case '/logout':
          require_once CONTROLLER_DIR . 'kirjaudu.php';
          logout();
          header("Location: yritys");
          break;
          
case '/tapahtumat':
            require_once MODEL_DIR . 'tapahtuma.php';
            $tapahtumat = haeTapahtumat();
            echo $templates->render('tapahtumat',['tapahtumat' => $tapahtumat]);
            break;
case '/tapahtuma':
            require_once MODEL_DIR . 'tapahtuma.php';
            require_once MODEL_DIR . 'ilmoittautuminen.php';
            $tapahtuma = haeTapahtuma($_GET['id']);
            if ($tapahtuma) {
            if ($loggeduser) {
            $ilmoittautuminen = haeIlmoittautuminen($loggeduser['idhenkilo'],$tapahtuma['idtapahtuma']);
            } else {
            $ilmoittautuminen = NULL;
            }
            echo $templates->render('tapahtuma',['tapahtuma' => $tapahtuma,
           'ilmoittautuminen' => $ilmoittautuminen,
           'loggeduser' => $loggeduser]);
            } else {
            echo $templates->render('tapahtumanotfound');
            }
            break;

case '/ilmoittaudu':
          if ($_GET['id']) {
          require_once MODEL_DIR . 'ilmoittautuminen.php';
          $idtapahtuma = $_GET['id'];
          if ($loggeduser) {
          lisaaIlmoittautuminen($loggeduser['idhenkilo'],$idtapahtuma);
          }
          header("Location: tapahtuma?id=$idtapahtuma");
          } else {
          header("Location: tapahtumat");
          }
          break;

case '/peru':
         if ($_GET['id']) {
         require_once MODEL_DIR . 'ilmoittautuminen.php';
         $idtapahtuma = $_GET['id'];
         if ($loggeduser) {
         poistaIlmoittautuminen($loggeduser['idhenkilo'],$idtapahtuma);
         }
         header("Location: tapahtuma?id=$idtapahtuma");
         } else {
         header("Location: tapahtumat");  
         }
         break;



case '/tarvikkeet':
        require_once MODEL_DIR . 'tarvike.php';
        $tarvikkeet = haeTarvikkeet();
        echo $templates->render('tarvikkeet',['tarvikkeet' => $tarvikkeet]);
        break;

case '/tarvike':
        require_once MODEL_DIR . 'tarvike.php';
        require_once MODEL_DIR . 'tilaus.php';
        $tarvike = haeTarvike($_GET['id']);
        if ($tarvike) {
        if ($loggeduser) {
        $tilaus = haeTilaus($loggeduser['idhenkilo'],$tarvike['idtarvike']);
        } else {
        $tilaus = NULL;
        }
        echo $templates->render('tarvike',['tarvike' => $tarvike,
        'tilaus' => $tilaus,
        'loggeduser' => $loggeduser]);
        } else {
        echo $templates->render('tapahtumanotfound');
        }
        break;

case '/tilaa':
        if ($_GET['id']) {
        require_once MODEL_DIR . 'tilaus.php';
        $idtarvike = $_GET['id'];
        if ($loggeduser) {
        lisaaTilaus($loggeduser['idhenkilo'],$idtarvike);
        }
        header("Location: tarvike?id=$idtarvike");
        } else {
        header("Location: tarvikeet");
        }
        break;

case '/perutilaus':
          if ($_GET['id']) {
          require_once MODEL_DIR . 'tilaus.php';
          $idtarvike = $_GET['id'];
          if ($loggeduser) {
          poistaTilaus($loggeduser['idhenkilo'],$idtarvike);
          }
          header("Location: tarvike?id=$idtarvike");
          } else {
          header("Location: tarvikkeet");  
          }
          break;

case '/hevoset':
          require_once MODEL_DIR . 'hevonen.php';
          $hevoset = haeHevoset();
          echo $templates->render('hevoset',['hevoset' => $hevoset]);
          break;
  case '/hevonen':
            require_once MODEL_DIR . 'hevonen.php';
            require_once MODEL_DIR . 'kiinnostus.php';
            $hevonen = haeHevonen($_GET['id']);
            if ($hevonen) {
            if ($loggeduser) {
            $kiinnostus = haekiinnostus($loggeduser['idhenkilo'],$hevonen['idhevonen']);
            } else {
            $kiinnostus = NULL;
            }
            echo $templates->render('hevonen',['hevonen' => $hevonen,
           'kiinnostus' => $kiinnostus,
           'loggeduser' => $loggeduser]);
            } else {
            echo $templates->render('tapahtumanotfound');
            }
            break;
  
case '/kerrokiinnostuksesi':
         if ($_GET['id']) {
         require_once MODEL_DIR . 'kiinnostus.php';
         $idhevonen = $_GET['id'];
         if ($loggeduser) {
         lisaaKiinnostus($loggeduser['idhenkilo'],$idhevonen);
         }
         header("Location: hevonen?id=$idhevonen");
         } else {
         header("Location: hevoset");
         }
         break;
  
case '/perukiinnostuksesi':
         if ($_GET['id']) {
         require_once MODEL_DIR . 'kiinnostus.php';
         $idhevonen = $_GET['id'];
         if ($loggeduser) {
         poistaKiinnostus($loggeduser['idhenkilo'],$idhevonen);
         }
         header("Location: hevonen?id=$idhevonen");
         } else {
         header("Location: hevoset");  
         }
        break;
          
case '/lisaa_tili':
        if (isset($_POST['laheta'])) {
        $formdata = cleanArrayData($_POST);
        require_once CONTROLLER_DIR . 'tili.php';
        $tulos = lisaaTili($formdata,$config['urls']['baseUrl']);
        if ($tulos['status'] == "200") {
        echo $templates->render('tili_luotu', ['formdata' => $formdata]);
        break;
        }
        echo $templates->render('lisaa_tili', ['formdata' => $formdata, 'error' => $tulos['error']]);
        break;
        } else {
        echo $templates->render('lisaa_tili', ['formdata' => [], 'error' => []]);
        break;
        } 
              
case '/vahvista':
       if (isset($_GET['key'])) {
       $key = $_GET['key'];
       require_once MODEL_DIR . 'henkilo.php';
       if (vahvistaTili($key)) {
       echo $templates->render('tili_aktivoitu');
       } else {
       echo $templates->render('tili_aktivointi_virhe');
       }
       } else {
       header("Location: " . $config['urls']['baseUrl']);
       }
       break;
            
case '/tilaa_vaihtoavain':
          $formdata = cleanArrayData($_POST);
          if (isset($formdata['laheta'])) {    
          require_once MODEL_DIR . 'henkilo.php';
          $user = haeHenkilo($formdata['email']);
          if ($user) {
          require_once CONTROLLER_DIR . 'tili.php';
          $tulos = luoVaihtoavain($formdata['email'],$config['urls']['baseUrl']);
          if ($tulos['status'] == "200") {
          echo $templates->render('tilaa_vaihtoavain_lahetetty');
          break;
          }
          echo $templates->render('virhe');
          break;
          } else {
          echo $templates->render('tilaa_vaihtoavain_lahetetty');
          break;
          }
          } else {
          echo $templates->render('tilaa_vaihtoavain_lomake');
          }
          break;

  case '/reset':
       $resetkey = $_GET['key'];
       require_once MODEL_DIR . 'henkilo.php';
        $rivi = tarkistaVaihtoavain($resetkey);
        if ($rivi) {                  
        if ($rivi['aikaikkuna'] < 0) {
        echo $templates->render('reset_virhe');
        break;
        }
        } else {
        echo $templates->render('reset_virhe');
        break;
        }
        $formdata = cleanArrayData($_POST);
        if (isset($formdata['laheta'])) {
        require_once CONTROLLER_DIR . 'tili.php';
        $tulos = resetoiSalasana($formdata,$resetkey);
        if ($tulos['status'] == "200") {
        echo $templates->render('reset_valmis');
        break;
        }
        echo $templates->render('reset_lomake', ['error' => $tulos['error']]);
        break;
        } else {
        echo $templates->render('reset_lomake', ['error' => '']);
        break;
        }
                                 
                      
 case (bool)preg_match('/\/admin.*/', $request):
     if ($loggeduser["admin"]) {
     echo $templates->render('admin');
     require_once MODEL_DIR . 'varaus.php';
     require_once MODEL_DIR . 'tiedusteluthev.php';
     require_once MODEL_DIR . 'kaikkitilaukset.php';
         
     $tilaukset = haeTilaukset();
     $varatut = haeIlmoittautumiset();
     $kiinnostukset = haeKiinnostukset();

     echo $templates->render('varatut',['varatut' => $varatut]);
     echo $templates->render('tilaukset',['tilaukset' => $tilaukset]);
     echo $templates->render('kiinnostukset',['kiinnostukset' => $kiinnostukset]);

     } else {
     echo $templates->render('admin_ei_oikeuksia');
     }
     break;

              
case '/laheta_viesti': 
       echo $templates->render('laheta_viesti');
       break; 
case '/viesti': 
         if  (!$loggeduser) {
         echo "Luo tili tai kirjaudu sisään, niin voit lähettää viestin";
         }
         if ($loggeduser) {
         $formdata = cleanArrayData($_POST);
         if (isset($_POST['lahetaviesti'])) {
         if (!preg_match("/^[- '\p{L}]+$/u", $formdata["viesti"])) { 
         echo "Syötä viestisi ilman erikoismerkkejä";
         echo $templates->render('viesti_virheellinen');
         }
         require_once MODEL_DIR . 'viesti.php';    
         $id = lisaaViesteja($loggeduser['idhenkilo'],($formdata['viesti']));
         echo "Viestisi on lähetetty tunnisteella $id";
         echo $templates->render('viesti_lahetetty');
         }
         }
         else {
          echo $templates->render('viesti_virheellinen');
         }
         break;
    
 
case '/yritys': if ($request === '/yritys') {
    echo $templates->render('yritys');
    }
    break; 
    case '/saa': if ($request === '/saa') {
        echo $templates->render('saa');
        }
        break; 

case '/saa_helsinki': if ($request === '/saa_helsinki') {
      echo $templates->render('saa_helsinki');
      }
      break; 

case '/saatiedote': if ($request === '/saatiedote') {
        echo $templates->render('saatiedote');
        }
        break; 

case '/tulossa': if ($request === '/tulossa') {
    echo $templates->render('tulossa');
    }
    break; 

case '/hieronta': if ($request === '/hieronta') {
     echo $templates->render('hieronta');
     }
     break; 
case '/ohjelma': if ($request === '/ohjelma') {
      echo $templates->render('ohjelma');
      }
      break; 
        
case '/kilpailut': if ($request === '/kilpailut') {
     echo $templates->render('kilpailut');
     }


else {
    echo $templates->render('notfound');
    }
    break;

default: 
    echo $templates->render('notfound');
    }    

?> 