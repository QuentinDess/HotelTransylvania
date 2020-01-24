@extends('layouts.app')

@section('content')  <!--==========================
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
  <section id="team">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Notre boutique</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Des objets souvenirs et bucoliques</p>
        </div>
      </div>

      <div class="row">
@foreach ($items as $item)
      <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="{{$item->photo}}" alt=""></div>
            <h4>{{$item->name}} </h4>
            <em>Description: {{$item->description}}</em></br>
            <em>Prix : {{$item->price}} $</em>
          </div>
         
         
          <form action="{{ route('createBasket')}}" method="POST">
          @csrf
          <input type="hidden" value="{{$item->id}}" name="item_id">
          <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
          <div class="form-group row">
            <label for="totalPrice" class="col-md-4 col-form-label text-md-right">{{ __('Nombre d\'objet') }}</label>
            <div class="col-md-6">
                <select name="totalPrice" id="totalPrice" required>
                    <option  value="{{1*intval($item->price)}}">1</option>
                    <option  value="{{2*intval($item->price)}}">2</option>
                    <option  value="{{3*intval($item->price)}}">3</option>
                    <option  value="{{4*intval($item->price)}}">4</option>
                    <option  value="{{5*intval($item->price)}}">5</option>
                    <option  value="{{6*intval($item->price)}}">6</option>
                    <option  value="{{7*intval($item->price)}}">7</option>
                    <option  value="{{8*intval($item->price)}}">8</option>
                    <option  value="{{9*intval($item->price)}}">9</option>
                </select>
            </div>
            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary updateUser">
                                    {{ __('Ajouter ') }}
                                </button>
                            </div>
                        </div>
            </form>
        </div>
        
      
        
        
 </div>           
@endforeach


    </section>
@endsection