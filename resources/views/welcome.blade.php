<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.0/examples/album/ -->
<html lang="en">
<head>
    <title>Weather</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<!-- Custom styles for this template -->
<link href="/css/app.css" rel="stylesheet">
</head>

<body>

<header>

</header>
<main role="main">
    <div class="container">
        @foreach ($area['DailyForecasts'] as $value)
            <p>{{ $value['Date'] }}</p>

            <h4>Temperature:</h4>
            <p>Minimum {{ (($value['Temperature']['Minimum']['Value'])-32)*(5/9) }}</p>
            <p>Maximum {{ (($value['Temperature']['Maximum']['Value'])-32)*(5/9) }}</p>

            <h4>Day:</h4>
            <p>Minimum {{ $value['Day']['IconPhrase'] }}</p>

        @endforeach
    </div>
</main>


</body>
</html>