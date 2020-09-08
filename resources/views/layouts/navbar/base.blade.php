<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">{{__('messages.brand')}}</h3>
        <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link {{ Request::path() ==  '/' ? 'active' : ''  }}" href="{{ route('home.welcome') }}">{{__('messages.home')}}</a>
        <a class="nav-link {{ Request::path() ==  'audios' ? 'active' : ''  }}" href="{{ route('home.audios') }}">{{__('messages.audios')}}</a>
        <a class="nav-link {{ Request::path() ==  'login' ? 'active' : ''  }}" href="{{ route('home.login') }}">{{__('messages.login')}}</a>
        <a class="nav-link {{ Request::path() ==  'signup' ? 'active' : ''  }}" href="{{ route('home.signup') }}">{{__('messages.signup')}}</a>
        </nav>
    </div>
</header>