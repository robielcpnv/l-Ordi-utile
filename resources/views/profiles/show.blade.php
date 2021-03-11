@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
          <h1 class="font-bold text-justify">
            {{ $profile->nom }} {{ $profile->prenom }} 
          </h1>
            <ul>
              <li>{{ $profile->titre }}</li>
              <li>{{ $profile->adresse }}</li>
              <li>{{ $profile->data_de_naissance }}</li>
              <li>{{ $profile->telephone }}</li>
              <li>{{ $profile->email }}</li>
              <li>{{ $profile->responsable_nom }}</li>
              <li>{{ $profile->responsable_prenom }}</li>
              <li>{{ $profile->responsable_telephone }}</li>
              <li>{{ $profile->responsable_email }}</li>
            </ul>
            <div class="flex justify-center">
              <a href="{{ route('profiles.edit',['profile'=>$profile]) }}">
                <button type="submit" class="bg-blue-400 text-white px-6 py-3 rounded font-medium ">
                Modifier </a>
              </button>
            </div>
        </div>  
    </div>
@endsection