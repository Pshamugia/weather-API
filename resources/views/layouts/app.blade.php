<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title and Description -->
    <title>Weather Website - Real-time and Forecast Weather in Georgia</title>
    <meta name="description" content="Get accurate and up-to-date weather information for cities in Georgia, including current weather and forecasts for 5 days.">

    <!-- Keywords -->
    <meta name="keywords" content="Georgia weather, Tbilisi weather, weather forecast, current weather, 5-day forecast, weather in Georgia, weather website, real-time weather, cities in Georgia">
    
    <!-- Author (optional but good for branding) -->
    <meta name="author" content="Your Website Name">
    
    <!-- Open Graph Meta Tags for Social Media Sharing -->
    <meta property="og:title" content="Weather in Georgia - Real-time and Forecast Weather">
    <meta property="og:description" content="Check the weather for major cities in Georgia, including current and 5-day forecasts. Stay updated with real-time data.">
    <meta property="og:image" content="{{ asset('public/images/logo/logo_weather.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Weather in Georgia - Real-time and Forecast Weather">
    <meta name="twitter:description" content="Stay updated on the weather in Georgia with current and forecast data. Check real-time conditions in Tbilisi, Batumi, Kutaisi, and more.">
    <meta name="twitter:image" content="{{ asset('public/images/logo/logo_weather.png') }}">

    <!-- Robots (optional, adjust if needed) -->
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon (Add a favicon for better UX) -->
    <link rel="icon" href="{{ asset('public/images/logo/favicon.ico') }}" type="image/x-icon">

     <!-- If using Bootstrap, include Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    

    <script>
        function submitCityForm(city) {
            var form = document.getElementById('cityForm');
            form.querySelector('input[name="city"]').value = city;
            form.submit();
        }
    </script>
</head>
<body>
 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('weather.show') }}">
            <img src="{{ asset('images/logo/logo_weather.png') }}" width="205px"> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        აირჩიე ქალაქი
                    </a>
                    <!-- Multi-column dropdown menu -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div class="dropdown-grid">
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Tbilisi')">თბილისი </a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Gori')">გორი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Senaki')">სენაკი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Zugdidi')">ზუგდიდი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Gurjaani')">გურჯაანი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Poti')">ფოთი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Telavi')">თელავი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Kvareli')">ყვარელი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Abastumani')">აბასთუმანი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Bolnisi')">ბოლნისი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Gudauri')">გუდაური</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Lagodekhi')">ლაგოდეხი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Mestia')">მესტია</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Oni')">ონი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Sachkhere')">საჩხერე</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Sokhumi')">სოხუმი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Shekvetili')">შეკვეთილი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Tsinandali')">წინანდალი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Khashuri')">ხაშური</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Akhaltsikhe')">ახალციხე</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Borjomi')">ბორჯომი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Lanchkhuti')">ლანჩხუთი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Mtskheta')">მცხეთა</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Rustavi')">რუსთავი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Surami')">სურამი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Kobuleti')">ქობულეთი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Shovi')">შოვი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Tskneti')">წყნეთი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Khobi')">ხობი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Batumi')">ბათუმი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Gonio')">გონიო</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Davit-gareji')">დავით-გარეჯი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Manglisi')">მანგლისი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Ozurgeti')">ოზურგეთი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Sagarejo')">საგარეჯო</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Sioni')">სიონი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Ureki')">ურეკი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Kutaisi')">ქუთაისი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Chokhatauri')">ჩოხატაური</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Chiatura')">ჭიათურა</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Bakuriani')">ბაკურიანი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Zestafoni')">ზესტაფონი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Tianeti')">თიანეთი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Marneuli')">მარნეული</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Omalo')">ომალო</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Samtredia')">სამტრედია</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Sighnaghi')">სიღნაღი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Ushguli')">უშგული</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Shatili')">შატილი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Tskhinvali')">ცხინვალი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Kharagauli')">ხარაგაული</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Gali')">გალი</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Ochamchire')">ოჩამჩირე</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('gagra')">გაგრა</a>
                            <a class="dropdown-item" href="#" onclick="submitCityForm('Gudauta')">გუდაუთა</a>








                            

                            
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <script>
        function submitCityForm(city) {
            const form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{ route("weather.show") }}'; // Adjust the route as necessary
    
            const cityInput = document.createElement('input');
            cityInput.type = 'hidden';
            cityInput.name = 'city';
            cityInput.value = city;
            form.appendChild(cityInput);
    
            document.body.appendChild(form);
            form.submit();
        }
    </script>
    
    <!-- CSS for multi-column dropdown -->
    <style>
        .dropdown-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* Adjust number of columns */
            gap: 10px; /* Adjust space between items */
        }
    </style>
    
    

    <!-- Weather Form -->
    <form id="cityForm" action="{{ route('weather.show') }}" method="GET" style="display: none;">
        <input type="text" name="city" value="">
        <input type="hidden" name="duration" value="3"> <!-- Default duration, can be changed -->
    </form>

    <div class="container mt-3">
        @yield('content')
    </div>
</body>
</html> 