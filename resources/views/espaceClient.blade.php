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
<section>
<main class="py-4">
<!-- <div class="row"> -->
<div class="cardClient">
        <div class="card-footer">
                
        </div>
        <div class="card-body">
            <div class="card-text"> 
                <strong>{{$user->firstName}}</strong> {{$user->lastName}}
                <p> Informations:</p>
                <ul>
                <li>Tel: {{$user->phoneNumber}}</li>
                <li>Code Postale: {{$user->postalCode}}</li>
                <li>Email: {{$user->email}}</li>
                </ul>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('editUser', $user->id) }}" method="POST">
                @csrf                                
                <button class="btn btn-primary" type="submit">Modifier</button>
            </form> </br>  
            <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                @csrf 
                <button class="btn btn-danger" type="submit">Supprimer</button>    
            </form>    
        </div>
</div>
<div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Vos Réservations</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
@foreach ($bookings as $booking)
<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
    <section id="testimonials">
    <div class="container wow fadeInUp">
      
      <div class="row">
       
       
          <div class="col-md-3">
          <div class="profile">
          <div class="pic"><img src="{{$booking->room->avatar}}" alt=""></div>
          <h4>{{$booking->room->name}}</h4>
            <span>Taille: {{$booking->room->size}}</span></br>
            <span>Prix Total: <strong>{{$booking->totalPrice}}$<strong></span>
          </div>
          </div>
        <div class="col-md-9">
          <div class="quote">
            <b><img src="img/quote_sign_left.png" alt=""></b> {{$booking->room->description}}</br>
                  Date d'arrivée {{$booking->beginDate}}</br>
                  Nombre de Nuits : {{$booking->totalPrice / intval($booking->room->price)}}            
             <small><img src="img/quote_sign_right.png" alt=""></small>
          </div>
        </div>
        <form action="{{ route('deleteBooking', $booking->id) }}" method="POST">
                        @csrf 
                        <button type="submit">Supprimer</button>    
          </form>    
      </div>
    </div>
  </section>
  @endforeach 
</div>
</section>
@endsection