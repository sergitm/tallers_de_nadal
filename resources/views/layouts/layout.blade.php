<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])  
</head>

<body class="bg-secondary">

    @section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('welcome')}}">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              @if(Route::current()->getName() === 'welcome')
                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
              @else
                <a class="nav-link" aria-current="page" href="{{route('welcome')}}">Home</a>
              @endif
              <a class="nav-link" href="#">Features</a>
              <a class="nav-link" href="#">Pricing</a>
            </div>
          </div>
          <div class="ml-auto">
            <div class="navbar-nav">
              @if (Route::current()->getName() === 'login')
                <a class="nav-link active" href="{{route('login')}}">Login</a>
              @else
                <a class="nav-link" href="{{route('login')}}">Login</a>
              @endif
              </div>
          </div>
        </div>
      </nav>
    @show

    <div class="container"> 
        @yield('form')
    </div>
</body>

</html>