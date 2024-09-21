@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ამინდი საქართველოში</h1>

    <!-- Weather Form -->
    <form id="weather-form" action="{{ route('weather.show') }}" method="GET">
        <div class="form-group">
            <label for="city">შეიყვანეთ ქალაქის სახელი</label>
            @php
            // Reverse mapping from Latin to Georgian
            $cityTranslations = [
                'Tbilisi' => 'თბილისი',
                'Kutaisi' => 'ქუთაისი',
                'Batumi' => 'ბათუმი',
                'Gori' => 'გორი',
                'Gurjaani' => 'გურჯაანი',
                'Zugdidi' => 'ზუგდიდი',
                'Poti' => 'ფოთი',
                'Abastumani' => 'აბასთუმანი',
                'Lanchkhuti' => 'ლანჩხუთი',
                'Gudauri' => 'გუდაური',
                'Senaki' => 'სენაკი',
                'Telavi' => 'თელავი',
                'Kvareli' => 'ყვარელი',
                'Abastumani' => 'აბასთუმანი',
                'Bolnisi' => 'ბოლნისი',
                'Lagodekhi' => 'ლაგოდეხი',
                'Mestia' => 'მესტია',
                'Oni' => 'ონი',
                'Sachkhere' => 'საჩხერე',
                'Sokhumi' => 'სოხუმი',
                'Shekvetili' => 'შეკვეთილი',
                'Tsinandali' => 'წინანდალი',
                'Khashuri' => 'ხაშური',
                'Akhaltsikhe' => 'ახალციხე',
                'Borjomi' => 'ბორჯომი',
                'Lanchkhuti' => 'ლანჩხუთი',
                'Mtskheta' => 'მცხეთა',
                'Rustavi' => 'რუსთავი',
                'Surami' => 'სურამი',
                'Kobuleti' => 'ქობულეთი',
                'Shovi' => 'შოვი',
                'Tskneti' => 'წყნეთი',
                'Khobi' => 'ხობი',
                'Gonio' => 'გონიო',
                'Davit-gareji' => 'დავით-გარეჯი',
                'Manglisi' => 'მანგლისი',
                'Ozurgeti' => 'ოზურგეთი',
                'Sagarejo' => 'საგარეჯო',
                'Sioni' => 'სიონი',
                'Ureki' => 'ურეკი',
                'Chokhatauri' => 'ჩოხატაური',
                'Chiatura' => 'ჭიათურა',
                'Bakuriani' => 'ბაკურიანი',
                'Zestafoni' => 'ზესტაფონი',
                'Tianeti' => 'თიანეთი',
                'Marneuli' => 'მარნეული',
                'Omalo' => 'ომალო',
                'Samtredia' => 'სამტრედია',
                'Sighnaghi' => 'სიღნაღი',
                'Ushguli' => 'უშგული',
                'Shatili' => 'შატილი',
                'Tskhinvali' => 'ცხინვალი',
                'Kharagauli' => 'ხარაგაული',
                'Gali' => 'გალი',
                'Ochamchire' => 'ოჩამჩირე',
                'gagra' => 'გაგრა',
                'Gudauta' => 'გუდაუთა',
                // Add more cities as needed
            ];
        
            // Get the Georgian name if it exists in the array, otherwise fallback to the original
            $cityGeorgian = $cityTranslations[$city] ?? $city;
            @endphp
            
            <input type="text" name="city" class="form-control" id="city" value="{{ $cityGeorgian }}" placeholder="შეიყვანეთ ქალაქი საქართველოში" required>
        </div>
        <div class="form-group">
            <label for="duration">აირჩიეთ პერიოდი</label>
            <select name="duration" id="duration" class="form-control" onchange="this.form.submit()">
                <option value="current" {{ $duration == 'current' ? 'selected' : '' }}>დღევანდელი ამინდის პროგნოზი</option>
                <option value="5days" {{ $duration == '5days' ? 'selected' : '' }}>5 დღის ამინდის პროგნოზი</option>
            </select>
        </div>
    </form>

    <!-- Weather Data -->
    @if(isset($errorMessage))
        <div class="alert alert-danger mt-5">
            {{ $errorMessage }}
        </div>
    @elseif(isset($weatherData) && !empty($weatherData))
        <div class="weather-results mt-5">
            @if($duration == 'current')
                <h1>@lang('messages.weather_in') {{ $cityGeorgian }}</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cityGeorgian }}</h5>
                        <img src="{{ asset('images/weather/' . $weatherData['weather'][0]['weather_image']) }}" alt="{{ $weatherData['weather'][0]['description'] }}" width="40px">

                        <p class="card-text">
                            <strong>@lang('messages.temperature'):</strong> {{ $weatherData['main']['temp'] }}°C<br>
                            <strong>@lang('messages.weather'):</strong> {{ $weatherData['weather'][0]['description'] }}<br>
                            <strong>@lang('messages.humidity'):</strong> {{ $weatherData['main']['humidity'] }}%<br>
                            <strong>@lang('messages.wind_speed'):</strong> {{ $weatherData['wind']['speed'] }} მ/წ
                        </p>
                    </div>
                </div>
            @else
                <h1>@lang('messages.weather_forecast_for') {{ $cityGeorgian }}</h1>
                <div class="row">
                    @foreach($weatherData as $day)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ \Carbon\Carbon::createFromTimestamp($day['dt'])->format('d M Y') }}
                                    </h5>
                                    <img src="{{ asset('images/weather/' . $day['weather'][0]['weather_image']) }}" alt="{{ $day['weather'][0]['description'] }}" width="40px">

                                    <p class="card-text">
                                        <strong>@lang('messages.temperature'):</strong> {{ $day['main']['temp'] }}°C<br>
                                        <strong>@lang('messages.weather'):</strong> {{ $day['weather'][0]['description'] }}<br>
                                        <strong>@lang('messages.humidity'):</strong> {{ $day['main']['humidity'] }}%<br>
                                        <strong>@lang('messages.wind_speed'):</strong> {{ $day['wind']['speed'] }} მ/წ
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @else
        <div class="alert alert-info mt-5">
            ინფორმაცია ამინდის შესახებ არ არის ხელმისაწვდომი.
        </div>
    @endif
</div>
@endsection
