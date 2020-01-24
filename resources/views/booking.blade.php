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
    <section id="testimonials">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Votre Chambre</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
      <div class="row">
       
       
          <div class="col-md-3">
          <div class="profile">
          <div class="pic"><img src="{{$room->avatar}}" alt=""></div>
          <h4>{{$room->name}}</h4>
            <span>Taille: {{$room->size}}</span></br>
            <span>Prix: {{$room->price}}$</span>
          </div>
          </div>
        <div class="col-md-9">
          <div class="quote">
            <b><img src="img/quote_sign_left.png" alt=""></b> {{$room->description}} <small><img src="img/quote_sign_right.png" alt=""></small>
          </div>
        </div>
      </div>
    </div>
  </section>
    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Faites votre réservation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createBooking')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="beginDate" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'arrivée') }}</label>

                            <div class="col-md-6">
                                <input id="beginDate" type="date" 
                                type="date" id="start" min="2019-01-01" max="2019-12-31" class="form-control @error('name') is-invalid @enderror" name="beginDate" autofocus>

                                @error('beginDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="totalPrice" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Nuitées') }}</label>
                            <div class="col-md-6">
                                <select name="totalPrice" id="totalPrice" required>
                                    <option  value="{{1*intval($room->price)}}">1</option>
                                    <option  value="{{2*intval($room->price)}}">2</option>
                                    <option  value="{{3*intval($room->price)}}">3</option>
                                    <option  value="{{4*intval($room->price)}}">4</option>
                                    <option  value="{{5*intval($room->price)}}">5</option>
                                    <option  value="{{6*intval($room->price)}}">6</option>
                                    <option  value="{{7*intval($room->price)}}">7</option>
                                </select>
                            </div>
                        </div>  
                        </div>
                        
                        </div>
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        <input type="hidden" value="{{$room->id}}" name="room_id">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary updateUser">
                                    {{ __('Réservez') }}
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