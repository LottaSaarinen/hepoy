<?php

$this->layout('template', ['title' => 'sää']) ?>

<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// API:n URL
$url = "https://opendata.fmi.fi/wfs?service=WFS&version=2.0.0&request=getFeature&storedquery_id=fmi::forecast::harmonie::surface::point::multipointcoverage&place=helsinki&";

// Haetaan XML-tiedot URL:sta
$response = file_get_contents($url);

// Tarkistetaan, että pyyntö onnistui
if ($response === FALSE) {
    die('Virhe haettaessa tietoja API:sta.');
}

// Ladataan XML vastaus SimpleXML-objektiin
$xml = simplexml_load_string($response);

// Tarkistetaan XML:n lataus onnistui
if ($xml === FALSE) {
    die('Virhe käsiteltäessä XML-dataa.');
}

// Tulostetaan XML-rakenne
echo "<pre>" . print_r($xml, true) . "</pre>";

// Esimerkki XPath-kyselyistä
$namespaces = $xml->getNamespaces(true);
$xml->registerXPathNamespace('gml', $namespaces['gml']);
$xml->registerXPathNamespace('om', $namespaces['om']);

// Etsitään kaikki taulukkomuotoiset tiedot
$points = $xml->xpath('//gml:pointMember'); // Tarkista oikea XPath
$temperatures = [];

foreach ($points as $point) {
    $timeNodes = $point->xpath('.//om:phenomenonTime'); // Tarkista XPath
    $resultNodes = $point->xpath('.//om:result'); // Tarkista XPath
    
    if ($timeNodes && $resultNodes) {
        $time = (string) $timeNodes[0];
        $temperature = (string) $resultNodes[0];
        $temperatures[] = [
            'time' => $time,
            'temperature' => $temperature,
        ];
    }
}

// Järjestetään taulukko ajan mukaan
usort($temperatures, function($a, $b) {
    return strcmp($a['time'], $b['time']);
});

// Tulostetaan tulokset
echo "<h1>Helsingin sääennusteet</h1>";
foreach ($temperatures as $entry) {
    echo "<p>Aika: " . htmlspecialchars($entry['starttime']) . "<br>Lämpötila: " . htmlspecialchars($entry['parameters']) . " °C</p>";
}


/*
error_reporting(E_ALL);
ini_set('display_errors', 1);

// API:n URL
$url = "https://opendata.fmi.fi/wfs?service=WFS&version=2.0.0&request=getFeature&storedquery_id=fmi::forecast::harmonie::surface::point::multipointcoverage&place=helsinki&";

// Haetaan XML-tiedot URL:sta
$response = file_get_contents($url);

// Tarkistetaan, että pyyntö onnistui
if ($response === FALSE) {
    die('Virhe haettaessa tietoja API:sta.');
}

// Ladataan XML vastaus SimpleXML-objektiin
$xml = simplexml_load_string($response);

// Tarkistetaan XML:n lataus onnistui
if ($xml === FALSE) {
    die('Virhe käsiteltäessä XML-dataa.');
}

// Tulostetaan XML-rakenne
// echo "<pre>" . print_r($xml, true) . "</pre>";

// Käytetään XPathia löytääksemme tietoja
$points = $xml->xpath('//gml:pointMember');
$temperatures = [];

foreach ($points as $point) {
    // Tarkista mikä on oikea XPath tiedoille
    $time = (string) $point->xpath('.//om:phenomenonTime')[0];
    $temperature = (string) $point->xpath('.//om:result')[0];

    // Lisätään tiedot taulukkoon
    $temperatures[] = [
        'time' => $time,
        'temperature' => $temperature,
    ];
}

// Järjestetään taulukko ajan mukaan
usort($temperatures, function($a, $b) {
    return strcmp($a['time'], $b['time']);
});

// Tulostetaan tulokset
echo "<h1>Helsingin sääennusteet</h1>";
foreach ($temperatures as $entry) {
    echo "<p>Aika: " . htmlspecialchars($entry['time']) . "<br>Lämpötila: " . htmlspecialchars($entry['temperature']) . " °C</p>";
}

/*
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// API:n URL
$url = "https://opendata.fmi.fi/wfs?service=WFS&version=2.0.0&request=getFeature&storedquery_id=fmi::forecast::harmonie::surface::point::multipointcoverage&place=helsinki&";

// Haetaan vastaus URL:sta
$response = file_get_contents($url);

// Tulostetaan raaka vastaus
//header('Content-Type: text/plain');
echo $response;

/*
// API:n URL
$url = "https://opendata.fmi.fi/wfs?service=WFS&version=2.0.0&request=getFeature&storedquery_id=fmi::forecast::harmonie::surface::point::multipointcoverage&place=helsinki&";

// Haetaan XML-tiedot URL:sta
$response = file_get_contents($url);

// Tarkistetaan, että pyyntö onnistui
if ($response === FALSE) {
    die('Virhe haettaessa tietoja API:sta.');
}

// Tulostetaan koko XML-vastaus raakana
header('Content-Type: application/xml');
echo $response;

/*
// API:n URL
$url = "https://opendata.fmi.fi/wfs?service=WFS&version=2.0.0&request=getFeature&storedquery_id=fmi::forecast::harmonie::surface::point::multipointcoverage&place=helsinki&";

// Haetaan XML-tiedot URL:sta
$response = file_get_contents($url);

// Tarkistetaan, että pyyntö onnistui
if ($response === FALSE) {
    die('Virhe haettaessa tietoja API:sta.');
}

// Ladataan XML vastaus SimpleXML-objektiin
$xml = simplexml_load_string($response);

// Tarkistetaan XML:n lataus onnistui
if ($xml === FALSE) {
    die('Virhe käsiteltäessä XML-dataa.');
}

// Tulostetaan koko XML rakenteen hahmottamiseksi
echo "<pre>";
print_r($xml);
echo "</pre>";

// Etsitään kaikki taulukkomuotoiset tiedot
foreach ($xml->xpath('//gml:tupleList') as $tupleList) {
    $values = explode("\n", trim($tupleList));
    
    foreach ($values as $value) {
        $data = explode(",", $value);
        if (count($data) > 1) {
            // Oletetaan, että toinen sarake voi olla lämpötila
            $time = $data[0];
            $temperature = $data[1]; // Oletettu lämpötila
            echo "<p>Aika: $time<br>Lämpötila: $temperature °C</p>";
        }
    }
}


/*
// API:n URL
$url = "https://opendata.fmi.fi/wfs?service=WFS&version=2.0.0&request=getFeature&storedquery_id=fmi::forecast::harmonie::surface::point::multipointcoverage&place=helsinki&";

// Haetaan XML-tiedot URL:sta
$response = file_get_contents($url);

// Tarkistetaan, että pyyntö onnistui
if ($response === FALSE) {
    die('Virhe haettaessa tietoja API:sta.');
}

// Ladataan XML vastaus SimpleXML-objektiin
$xml = simplexml_load_string($response);

// Tarkistetaan XML:n lataus onnistui
if ($xml === FALSE) {
    die('Virhe käsiteltäessä XML-dataa.');
}

// Tulostetaan koko XML rakenteen hahmottamiseksi
echo "<pre>";
print_r($xml);
echo "</pre>";

// Etsitään lämpötila-arvot
$temperatures = [];
foreach ($xml->xpath('//gml:doubleOrNilReasonTupleList') as $tupleList) {
    $values = explode("\n", trim($tupleList));
    foreach ($values as $value) {
        $data = explode(",", $value);
        if (isset($data[1])) { // Lämpötila on yleensä toisessa sarakkeessa
            $temperatures[] = $data[1];
        }
    }
}

// Tulostetaan ensimmäinen lämpötila-arvo, jos se on olemassa
if (!empty($temperatures)) {
    echo "<h1>Helsingin lämpötilaennusteet</h1>";
    echo "<p>Ensimmäinen lämpötilaennuste: " . $temperatures[0] . " °C</p>";
} else {
    echo "<p>Ei lämpötila-arvoja löytynyt.</p>";
}
?>
*/

?>