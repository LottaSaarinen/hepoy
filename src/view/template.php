
<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>🐎HepOy- <?=$this->e($title)?></title>
    <meta charset="UTF-8">  
    <link href="styles/styles.css" rel="stylesheet">
  </head>
  <body>
    <header>
    <?php
          if (isset($_SESSION['user'])) {
            
              echo "<h><div class='profile'>$_SESSION[user]</div></h>";
              echo "<h><div><a href='logout'>Kirjaudu ulos</a></div></h>";
              if (isset($_SESSION['admin']) && $_SESSION['admin']) {
              echo "<h><div><a href='admin'>Ylläpitosivut</a></div></h>";  
            }
            } else {
             echo "<h><div><a href='kirjaudu'>Kirjaudu👤</a></div></h>";
          }
        ?>
  <div>
    <ul>
      <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn"><b>🐎HepOy</b></a>
      <div class="dropdown-content">
      <a href="yritys">Yritys ja yhteystiedot</a>
      <a href="hieronta">Hevosten hieronta</a>
      <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Tapahtumat ja kilpailut</a>
      <div class="dropdown-content">
      <a href="tapahtumat">Tapahtumat ja ilmottautumiset</a>
      <a href="kilpailut">🐎HepOy Weekend2025</a>
      <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Myyntihevoset ja hevostarvikkeet</a>
      <div class="dropdown-content">
      <a href="tarvikkeet">Ratsutarvikemyymälä</a>
      <a href="hevoset">Myyntihevoset</a>
    </div>
  </li>
</ul>


      </div>
   
    </header>
    <section>
  
</p>
<br>

      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>🐎HepOy &copy Porkkana </div>
    </footer>
  </body>
</html>