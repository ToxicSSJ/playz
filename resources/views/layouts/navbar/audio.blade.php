<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Home Page')</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
          <div class="container">
              <a class="navbar-brand" href="{{ route('home.index') }}">
                  {{ config('app.name', 'PlayZ') }}
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">
                      <!-- Future Left Side Links -->
                      
                  </ul>
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <a class="col-5" href="/audio/list">
                        {{ config('app.navbar.audio', 'List') }}
                      </a>
                      <a class="col-5" href="/audio/create">
                        {{ config('app.navbar.audio', 'Create') }}
                      </a>
                      <!-- Future authentication Links -->           
                  </ul>
              </div>
          </div>
      </nav>
      <main class="py-4">
          @yield('content')
      </main>
  </div>
</body>
</html>