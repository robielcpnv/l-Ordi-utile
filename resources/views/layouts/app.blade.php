<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>L'ordi Utile</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-200">
  <nav class="p-6 bg-white flex justify-between mb-6 md:p-8">
    <ul class="flex items-center">
      <li>
        <a href="/" class="p-3">Home</a>
      </li>
      @auth        
      <li>
        <a href="{{ route('compte') }}" class="p-3">Mes Compte</a>
      </li>  
      @endauth
    </ul>
    
    <ul class="flex items-center"> 
      @auth
        <li>
          <a href="{{ route('profile') }}" class="p-3">Profile</a>
        </li>    
        <li>
          <form action="{{ route('logout') }}" method="post" class="p-3 inline">
            @csrf
            <button type="submit">Logout</button>
          </form>
        </li>
        <li>
          <a href="{{ route('register') }}" class="p-3">Register</a>
        </li>
        @endauth 
        @guest
        <li>
          <a href="{{ route('login') }}" class="p-3">Login</a>
        </li>    
      @endguest
    </ul>
  </nav>



  @yield('content')
</body>
</html>