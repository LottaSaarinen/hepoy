<?php

function siivoaViesti($viesti) {
    
    $kielletyt = ['SELECT','CREATE','DELETE','DROP','TRUNCATE','TRUNC','INSERT','UPDATE','COPY','GRANT',
    'REVOKE','PROCEDURE','FUNCTION','RETURNS','HREF','.exe','.bat','.cmd','.sh','.html','.php','.js',';','/'
    ,'--','/*','*/','||','$','<script>','<a>','onerror=','onload=','javascript','<div>','<img>','<iframe>','<div>','<span>'];

    foreach ($viesti  as $key => $value)  {
      
        foreach ($kielletyt as $kielletty) {
            if (stripos($value, $kielletty) !==false) {
                return !$viesti;
            }
        }
    }
    return $viesti;
}
?>