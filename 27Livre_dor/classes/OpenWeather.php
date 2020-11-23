<?php
class OpenWeather {

    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getToday(string $city): ?array
    {
        try {
            $data = $this->callAPI("weather?q={$city}");
        }
        catch (Exception $e) {
            return [
                'temp' => 0,
                'description' => 'Météo indisponible',
                'date' => new DateTime()
            ];
        }
        return [
            'temp' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'date' => new DateTime()
        ];
    }

    public function getForecast(string $city): ?array
    {
        try {
            $data = $this->callAPI("forecast/daily?q={$city}");
        } catch (Exception $e) {
            return [];
        }
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
            $error = curl_error($curl);
            curl_close($curl);
            throw new Exception($error);
        }
        if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            throw new Exception($data);
        }
        $results = [];
        curl_close($curl);
        return json_decode($data, true);
    }
}