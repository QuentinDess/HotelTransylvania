@extends('layouts.app')

@section('content')
<!--==========================
Hero Section
============================-->
<section id="hero">
  <div class="hero-container">
    <div class="wow fadeIn">
      <div class="hero-logo">
        <img class="" src="img/logo.png" alt="Imperial">
      </div>

      <h1>Bienvennue à l'Hotel Transylvania</h1>
      <h2>We create <span class="rotating">des chambres à thèmes dans un cadre bucolique</span></h2>
      <div class="actions">
      @guest
              
                    <a  class="btn-get-started" href="{{ route('login') }}">{{ __('Login') }}</a>
              
                @if (Route::has('register'))

                        <a  class="btn-get-started"href="{{ route('register') }}">{{ __('Register') }}</a>
                   
                @endif
            @else
                @if(Auth::user()->role=="client")

                    <a  href="{{route('homeClient', Auth::user()->id)}}" class="btn-get-started" role="button" >
                        {{ Auth::user()->firstName }} <span class="caret"></span>
                    </a>
                    <div>
                    <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="btn-get-started">
                            {{ __('Logout') }}
                        </a>
    ​
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                  @elseif(Auth::user()->role=="proprietaire"|| Auth::user()->role=="manager")
                  <a  href="{{ route('homeAdmin') }}" class="btn-get-started" role="button" >
                        {{ Auth::user()->firstName }} <span class="caret"></span>
                    </a>
                    <div>
                    <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="btn-get-started">
                            {{ __('Logout') }}
                        </a>
    ​
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @elseif(Auth::user()->role=="personnel" )
                    <a  href="{{route('homeStaff')}}" class="btn-get-started" role="button" >
                        {{ Auth::user()->firstName }} <span class="caret"></span>
                    </a>
                    <div>
                    <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="btn-get-started">
                            {{ __('Logout') }}
                        </a>
    ​
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                  @endif
            @endguest
       
      </div>
    </div>
  </div>
</section>
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
<!--==========================
  Weather Section
  ============================-->
<section id="weatherApi">
<h6>Cherchez la météo par ville et cliquez sur la loupe =D</h6>
<div class="search_bar">
    <i class="fas fa-search"></i>
    <input type="text" placeholder="search">


</section>
</div>
<div class="api">
</div>
<!--==========================
  Team Section
  ============================-->
  <section id="team">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Notre équipe</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Des professionnels toujours disponible pour vos demandes</p>
        </div>
      </div>

      <div class="row">
      @foreach ($staffs  as $staff)
          
      
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="{{$staff->avatar}}" alt=""></div>
            <h4>{{$staff->firstName}} {{$staff->lastName}}</h4>
            <span>{{$staff->role}}</span>
            <em>Mail: {{$staff->email}}</em></br>
            <em>Tel: {{$staff->phoneNumber}}</em>
          </div>
        </div>
      
      @endforeach
      </div>
    </div>
  </section>
  <!--==========================
  Testimonials Section
  ============================-->
  <section id="testimonials">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Nos Chambres</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Quelque soit votre envie nous avons la chambre pour </p>
        </div>
      </div>
      @foreach ($rooms as $room)
      <div class="row">
       
          
        @guest
          @if (Route::has('register'))
          <div class="col-md-3">
          <div class="profile">
          <div class="pic"><img src="{{$room->avatar}}" alt=""></div>
          <h4>{{$room->name}}</h4>
            <span>Taille{{$room->size}}</span>
          </div>
          </div>
          @endif
        @else
          <div class="col-md-3">
          <div class="profile">
          <a href="{{route('showRoom')}}">
            <div class="pic"><img src="{{$room->avatar}}" alt=""></div>
          </a>
          <h4>{{$room->name}}</h4>
            <span>Taille{{$room->size}}</span>
          </div>
          </div>
          
        @endguest  
            
        
        <div class="col-md-9">
          <div class="quote">
            <b><img src="img/quote_sign_left.png" alt=""></b> {{$room->description}} <small><img src="img/quote_sign_right.png" alt=""></small>
          </div>
        </div>
      </div>
     @endforeach    


    </div>
  </section>
@endsection
