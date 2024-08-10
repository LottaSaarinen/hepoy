<?php


function lisaaViesteja($idhenkilo,$viesti) {
  DB::run('INSERT INTO viesti (idhenkilo, viesti) VALUES (?,?)',
          [$idhenkilo,$viesti]);
            return DB::lastInsertId();
}