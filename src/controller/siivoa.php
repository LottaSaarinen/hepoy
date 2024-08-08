<?php

function siivoaViesti($viesti) {

  
        // Lista kielletyistä sanoista.
        $kielletyt_sanat = ['SELECT','CREATE','DELETE','DROP','TRUNCATE','TRUNC','INSERT','UPDATE','COPY','GRANT',
        'REVOKE','PROCEDURE','FUNCTION','RETURNS','HREF','.exe','.bat','.cmd','.sh','.html','.php','.js',';','/'
        ,'--','/*','*/','||','$','<script>','<a>','onerror=','onload=','javascript','<div>','<img>','<iframe>','<div>','<span>'];
    
        // Käydään läpi jokainen kenttä ja tarkistetaan ne.
        foreach ($viesti as $key => $value) {
            foreach ($kielletyt_sanat as $kielletty) {
                if (stripos($value, $kielletty) !==false) {
                    return false;
                }
            }
        }
      
        return true;
    }
    
    ?>
