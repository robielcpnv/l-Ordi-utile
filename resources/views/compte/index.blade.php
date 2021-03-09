@extends('layouts.app')
@section('content')
    <div class=" flex justify-center font-bold">
      <ul class="flex items-center mb-8">
        
        <li>
          <a href="{{ route('contact') }}" class="p-3">Contact</a>
        </li>
        <li>
          <a href="{{ route('adresse') }}" class="p-3">Adresse</a>
        </li>        
        <li>
          <a href="{{ route('formation') }}" class="p-3">Formation</a>
        </li>
        <li>
          <a href="{{ route('responsable') }}" class="p-3">Responsable</a>
        </li>
      </ul>
    </div>
    @yield('profile')
@endsection