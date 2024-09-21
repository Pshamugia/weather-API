<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
 
    public function show(Request $request, $city = 'Tbilisi')
    {
        // Ensure city is not empty and convert to Latin script
        $city = trim($request->input('city', $city));
        
        // Mapping Georgian cities to Latin script
        $cityTranslations = [
            'თბილისი' => 'Tbilisi',
            'ქუთაისი' => 'Kutaisi',
            'ბათუმი' => 'Batumi',
            'გორი' => 'Gori',
            'გურჯაანი' => 'Gurjaani',
            'ზუგდიდი' => 'Zugdidi',
            // Add more cities as needed
        ];
        
        // Convert Georgian city names to Latin script if needed
        $city = $cityTranslations[$city] ?? $city;
        
        $duration = $request->input('duration', 'current'); // Default to 'current'
        $apiKey = 'a8441024883fff8a1c5013080489f99a';
        
        if ($duration == 'current') {
            // Current weather data endpoint
            $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
        } elseif ($duration == '5days') {
            // 5-day forecast endpoint
            $url = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$apiKey}&units=metric";
        } else {
            return view('weather.show', [
                'errorMessage' => 'Invalid duration',
                'city' => $city,
                'duration' => $duration
            ]);
        }
        
        // Fetch the API response
        try {
            $response = Http::get($url);
            $responseData = $response->json();
        } catch (\Exception $e) {
            Log::error('Weather API request failed:', ['error' => $e->getMessage()]);
            return view('weather.show', [
                'errorMessage' => 'We don\'t have results in our database.',
                'city' => $city,
                'duration' => $duration
            ]);
        }
        
        if (isset($responseData['cod']) && $responseData['cod'] != 200) {
            $errorMessage = $responseData['message'] ?? 'We don\'t have results in our database.';
            return view('weather.show', [
                'errorMessage' => $errorMessage,
                'city' => $city,
                'duration' => $duration
            ]);
        }
    
        $weatherTranslations = [
            'clear sky' => ['description' => 'უფრო ნათელი ცა', 'image' => 'clear_sky.png'],
            'few clouds' => ['description' => 'ცოტა ღრუბლები', 'image' => 'few_clouds.png'],
            'scattered clouds' => ['description' => 'მოყრილი ღრუბლები', 'image' => 'scattered_clouds.png'],
            'broken clouds' => ['description' => 'გატეხილი ღრუბლები', 'image' => 'broken_clouds.png'],
            'shower rain' => ['description' => 'წვიმიანი შხაპი', 'image' => 'shower_rain.png'],
            'rain' => ['description' => 'წვიმა', 'image' => 'rain.png'],
            'thunderstorm' => ['description' => 'ჭექა-ქუხილი', 'image' => 'thunderstorm.png'],
            'snow' => ['description' => 'თოვლი', 'image' => 'snow.png'],
            'mist' => ['description' => 'ნისლი', 'image' => 'mist.png'],
            'overcast clouds' => ['description' => 'დაფარული ღრუბლები', 'image' => 'overcast.png'],
            'light rain' => ['description' => 'მსუბუქი წვიმა', 'image' => 'light_rain.png'],
        ];
    
        if ($duration == 'current') {
            $weatherDescription = $responseData['weather'][0]['description'];
    
            if (isset($weatherTranslations[$weatherDescription])) {
                $responseData['weather'][0]['description'] = $weatherTranslations[$weatherDescription]['description'];
                $responseData['weather'][0]['weather_image'] = $weatherTranslations[$weatherDescription]['image'];
            } else {
                $responseData['weather'][0]['weather_image'] = 'default.png';
            }
    
            return view('weather.show', [
                'weatherData' => $responseData,
                'duration' => $duration,
                'city' => $city
            ]);
        } elseif ($duration == '5days') {
            $dailyForecasts = [];
    
            foreach ($responseData['list'] as $forecast) {
                $date = Carbon::createFromTimestamp($forecast['dt'])->format('Y-m-d');
            
                // Take the first forecast for each day, regardless of the time
                if (!isset($dailyForecasts[$date])) {
                    $dailyForecasts[$date] = $forecast;
                }
            }
    
            foreach ($dailyForecasts as &$day) {
                $description = $day['weather'][0]['description'];
    
                if (isset($weatherTranslations[$description])) {
                    $day['weather'][0]['description'] = $weatherTranslations[$description]['description'];
                    $day['weather'][0]['weather_image'] = $weatherTranslations[$description]['image'];
                } else {
                    $day['weather'][0]['weather_image'] = 'default.png';
                }
            }
    
            return view('weather.show', [
                'weatherData' => $dailyForecasts,
                'duration' => $duration,
                'city' => $city
            ]);
        }
    }
    


    public function showDropdown() {
        $cities = ['Tbilisi', 'Gori']; // List of cities you want to fetch weather for
        $weatherData = [];
        $apiKey = 'a8441024883fff8a1c5013080489f99a';
    
        foreach ($cities as $city) {
            // Make your API call for each city (replace this with actual API call)
            $response = Http::get("http://api.openweathermap.org/data/2.5/weather?q={$city}&appid=$apiKey&units=metric");
            $data = $response->json();

            if ($response->successful()) {
                $data = $response->json();
    
                // Ensure 'temp' field exists and add it to the weatherData array
                $weatherData[$city] = $data['main']['temp'] ?? 'N/A';
            } else {
                $weatherData[$city] = 'N/A'; // Default value if API call fails
            }
        }
       
    
        return view('weather.show', compact('weatherData'));
    }
    

}  
