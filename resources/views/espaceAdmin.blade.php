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
<h2>Voici tout les utilisateurs</h2>
<table>
    <thead>
        <tr> 
            <th> Prénom </th>
            <th> Nom </th>
            <th> Email </th>
        
            <th> Numéro de telephone </th>
            <th> Code postale </th> 
            <th> Identifiant </th>
            <th> Salaire </th>
            <th> Photo </th>
            <th> Modifier </th>
            <th> Supprimer </th>
        </tr>
    <tbody>
        @foreach ($users as $user)
        <tr>
                <td> {{ $user->firstName }} </td>
                <td> {{ $user->lastName }} </td>
                <td> {{ $user->email }} </td> 
                
                <td> {{ $user->phoneNumber }}  </td>
                <td> {{ $user->postalCode }} </td>
                <td> {{ $user->role }} </td>
                <td> {{ $user->wage }} </td>
                @if($user->avatar )
                <td> <img class="tablePic" src="{{ $user->avatar }}"> </td>
                @else
                <td> pas de photo </td>
                @endif
                <td>
                    <form action="{{ route('editUser', $user->id) }}" method="POST">
                        @csrf                                
                        <button type="submit">Modifier</button>
                    </form>    
                </td> 
                <td>
                    <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                        @csrf 
                        <button type="submit">Supprimer</button>    
                    </form>    
                </td> 
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{route('showRegister')}}"  role="button" class="btn-get-started" >Ajouter un Utilisateur</a>
<h2>Voici Toutes les chambres</h2>

<table>
    <thead>
        <tr> 
            <th> Nom </th>
            <th> Numéro de porte </th>
            <th> Prix </th>
            <th> Taille </th>
            <th> Photo </th>
            <th> Description </th> 
            <th> Modifier </th>
            <th> Supprimer </th>
        </tr>
    <tbody>
        @foreach ($rooms as $room)
        <tr>
                <td> {{ $room->name }} </td>
                <td> {{ $room->doorNumber }} </td>
                <td> {{ $room->price }} $</td> 
                <td> {{ $room->size}}  </td>
                <td> <img class="tablePic" src="{{ $room->avatar }}">  </td>
                <td> {{ $room->description }} </td>
                
                <td>
                    <form action="{{ route('editRoom', $room->id) }}" method="POST">
                        @csrf                                
                        <button type="submit">Modifier</button>
                    </form>    
                </td> 
                <td>
                    <form action="{{ route('deleteRoom', $room->id) }}" method="POST">
                        @csrf 
                        <button type="submit">Supprimer</button>    
                    </form>    
                </td> 
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{route('createRoom')}}" role="button" class="btn-get-started" >Ajouter une Chambre</a>
@endsection