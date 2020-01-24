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
              <a   href="{{ route('index') }}">{{ __('Accueil') }}</a>
            </li>
            <li>
            <a   href="{{ route('showRoom') }}">{{ __('Nos chambre') }}</a>
          </li>
          <li>
            <a   href="{{ route('shop') }}">{{ __('Boutique') }}</a>
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
                <div class="card-header">{{ __('Modifier') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('postRoom')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom de la chambre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                        <label for="doorNumber" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de porte') }}</label>

                            <div class="col-md-6">
                                <input id="doorNumber" type="number" class="form-control @error('name') is-invalid @enderror" name="doorNumber"  required autocomplete="doorNumber" autofocus>

                                @error('doorNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prix de la chambre') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description"   autocomplete="description">
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Taille') }}</label>
                            <div class="col-md-6">
                                <select name="size" id="size" required>
                                    <option  value="petite">Petite</option>
                                    <option  value="moyenne">Moyenne</option>
                                    <option  value="grande">Grande</option>
                                    <option  value="suite">Suite</option>
                                </select>
                            </div>
                        </div>   <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="text" class="form-control @error('avatar') is-invalid @enderror" name="avatar"   autocomplete="avatar">

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary updateUser">
                                    {{ __('Ajouter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
