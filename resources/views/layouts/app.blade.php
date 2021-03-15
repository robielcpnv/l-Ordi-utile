{{--
    File name       : app.blade.php
    Begin           : 2021-03-01
    Last Update     : 2021-03-15

    Description     : the main page

    Author          :Tesfazghi  robiel
--}}

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>L'ordi Utile</title>
 {{--  link to our css --}}
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-200">
  <nav class="p-6 bg-white flex justify-between mb-6 md:p-8">
    <ul class="flex items-center">
      <li>
        <a href="/" class="p-3">Home</a>
      </li>
      {{--  show only if it is connect --}}
      @auth
      <li >
        <a href="{{route('compte')}}" class="p-3">Mon profil</a>
      </li>
      @endauth
    </ul>

    <ul class="flex items-center capitalize">
       {{--  show only if it is connect --}}
        @auth
            {{-- don't show if the connect is a client --}}
            @if (auth()->user()->role != 'Client')
                {{-- show if the connect is direction --}}
                @if (auth()->user()->role == 'Direction')
                <li>
                    <a href="{{ route('statistiques.index') }}" class="p-3">Statistiques</a>
                </li>
                @endif
                <li>
                    <a href="{{ route('users.index') }}" class="p-3">Utilisateurs</a>
                </li>
            @endif
        <li>
         {{--  show user name and send to the user.show route is cliqued --}}
          <a href="{{ route('users.show', ['user' => auth()->user()->id] ) }}" class="p-3">{{ auth()->user()->prenom }}</a>
        </li>
        <li>{{-- we use the form ith summit button for our logout cause of security --}}
          <form action="{{ route('logout') }}" method="post" class="p-3 inline">
            @csrf {{-- crose site request forger protection from XSS --}}
            <button type="submit">Logout</button>
          </form>
        </li>
        @endauth
        {{-- show this only if it is not login --}}
        @guest
        <li>
          <a href="{{ route('login') }}" class="p-3">Login</a>
        </li>
      @endguest
    </ul>
  </nav>


{{-- all our code will inject here --}}
  @yield('content')



</body>
</html>
