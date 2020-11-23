<?php
require_once 'CurlException.php';
require_once 'HTTPException.php';
require_once 'UnauthorizedHTTPException.php';
class OpenWeather {

    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getToday(string $city): ?array
    {
        $data = $this->callAPI("weather?q={$city}");

        return [
            'temp' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'date' => new DateTime()
        ];
    }

    public function getForecast(string $city): ?array
    {
        $data = $this->callAPI("forecast/daily?q={$city}");

        foreach($data['list'] as $day) {
            $results[] = [
                'temp' => $day['temp']['day'],
                'description' => $day['weather'][0]['description'],
                'date' => new DateTime('@' . $day['dt'])
            ];
        }
        return $results;
    }

    private function callAPI(string $endpoint): ?array
    {
        $curl = curl_init("https://api.openweathermap.org/data/2.5/{$endpoint}&appid={$this->apiKey}&units=metric&lang=fr");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 1
        ]);
        $data = curl_exec($curl);
        if ($data === false) {
            throw new CurlException($curl);
        }
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($code !== 200) {
            curl_close($curl);
            if ($code === 401) {
                $data = json_decode($data, true);
                throw new UnauthorizedHTTPException($data['message'], 401);
            }
            throw new HTTPException($data, $code);
        }
        curl_close($curl);
        return json_decode($data, true);
    }
}