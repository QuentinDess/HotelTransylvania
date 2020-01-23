@extends('layouts.app')

@section('content')
  <!--==========================
  Header Section
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png"  alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Header 1</a></h1>-->
      </div>

      <nav >
        <ul class="navPerso">
         
          @guest
            <li>
              <a   href="{{ route('index') }}">{{ __('Accueil') }}</a>
            </li>
            <li> 
              <a   href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
                @if (Route::has('register'))
            <li>
              <a  href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>       
                @endif
            @else
            <li>
            <a   href="{{ route('showRoom') }}">{{ __('Nos chambre') }}</a>
          </li>
                @if(Auth::user()->role=="client")
            <li>
              <a  href="{{route('homeClient', Auth::user()->id)}}"  role="button" >{{ Auth::user()->firstName }} <span class="caret"></span></a>
            </li>      
            <li>
            <div>
            <li>      
              <a  href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" >{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            </div>
                @elseif(Auth::user()->role=="proprietaire"|| Auth::user()->role=="manager")
            <li>    
                <a  href="{{ route('homeAdmin') }}"  role="button" >
                        {{ Auth::user()->firstName }} <span class="caret"></span>
                </a>
            </li>
            <li>
            <div>
                <a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" >
                        {{ __('Logout') }}
                </a>
​
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
            @elseif(Auth::user()->role=="personnel" )
            <li>
                <a  href="{{route('homeStaff')}}"  role="button" >
                    {{ Auth::user()->firstName }} <span class="caret"></span>
                </a>
            </li>
            <li>
            <div>
                <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                    {{ __('Logout') }}
                </a>
    ​
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
              </li>
            @endif
            @endguest
          
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->  

        <main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
