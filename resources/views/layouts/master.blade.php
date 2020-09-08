<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<!-- <body>
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
                  <ul class="navbar-nav mr-auto">
                      
                  </ul>
                  <ul class="navbar-nav ml-auto">
                      <a class="col-5" href="/audios">
                        {{ config('app.navbar.audios', 'Audios') }}
                      </a>  
                  </ul>
              </div>
          </div>
      </nav>
      <main class="py-4">
          @yield('content')
      </main>
  </div>
</body> -->
<body class="text-center">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    @include('layouts.navbar.base')
    <main role="main" class="inner cover">
      @yield('content')
    </main>
    @include('layouts.footer.footer')
  </div>
</body>
</html>