<?php $this->layout('template', ['title' => 'Säätiedot']) ?>

<?php
// Hae token
$url = 'https://pfa.foreca.com/authorize/token?expire_hours=2';
$data = array('user' => 'tmi-lotta-saarinen', 'password' => 'xNJUizInTogM');

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result, true);
$token = $response['token'];

// Hae sijainti
$locationUrl = 'https://pfa.foreca.com/api/v1/location/search/Barcelona?lang=es';
$locationOptions = array(
    'http' => array(
        'header' => "Authorization: Bearer $token\r\n",
        'method' => 'GET',
    ),
);

$locationContext = stream_context_create($locationOptions);
$locationResult = file_get_contents($locationUrl, false, $locationContext);
$locationData = json_decode($locationResult, true);

// Hae sääennuste
$forecastUrl = 'https://pfa.foreca.com/api/v1/forecast/daily/103128760';
$forecastOptions = array(
    'http' => array(
        'header' => "Authorization: Bearer $token\r\n",
        'method' => 'GET',
    ),
);

$forecastContext = stream_context_create($forecastOptions);
$forecastResult = file_get_contents($forecastUrl, false, $forecastContext);
$forecastData = json_decode($forecastResult, true);

// Hae karttakapasiteetit
$capabilitiesUrl = 'https://map-eu.foreca.com/api/v1/capabilities';
$capabilitiesOptions = array(
    'http' => array(
        'header' => "Authorization: Bearer $token\r\n",
        'method' => 'GET',
    ),
);

$capabilitiesContext = stream_context_create($capabilitiesOptions);
$capabilitiesResult = file_get_contents($capabilitiesUrl, false, $capabilitiesContext);
$capabilitiesData = json_decode($capabilitiesResult, true);

// Tulosta tulokset
echo "Sijainti: ";
print_r($locationData);
echo "\n\nSääennuste: ";
print_r($forecastData);
echo "\n\nKarttakapasiteetit: ";
print_r($capabilitiesData);
?>




