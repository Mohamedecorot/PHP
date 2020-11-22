<?php
// curl_init pour initialiser
$curl = curl_init('https://api.openweathermap.org/data/2.5/weather?q=Marseille,fr&appid=94c6cf0868fa5cb930a5e2d71baf0dbf&units=metric&lang=fr
');
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 1
]);
// curl_exec pour excécuter
$data = curl_exec($curl);
if ($data === false) {
    // curl_error pour recuperer l'erreur
    var_dump(curl_error($curl));
} else {
    if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200) {
        $data = json_decode($data, true);
        echo '<pre>';
        var_dump($data['main']['temp']);
        echo '</pre>';
    }
}
// curl_close pour fermer
curl_close($curl);