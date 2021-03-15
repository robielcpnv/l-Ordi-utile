
{{--
    File name       : show.blade.php
    Begin           : 2021-03-11
    Last Update     : 2021-03-15

    Description     : show the user page

    Author          :Tesfazghi  robiel
--}}
{{-- link to our main page layouts.app.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="flex justify-between pb-5">
                {{-- show image if it existe in the profile table --}}
                @if ($profile)
                    <img src="{{ asset('storage/'.$profile->image) }}" class="sm:w-20 sm:h-20 w-48 h-48  rounded-full" alt="photo">
                @endif
                {{-- add QRcode of our url --}} 
                {!! QrCode::backgroundColor(127, 127, 173)->color(5, 5, 31)
                    ->size(160)->generate(Request::url()); !!}
            </div>
            <h1 class="font-bold text-3xl pb-4">{{ $user->nom}} {{$user->prenom }}</h1>
            <p><span class="font-bold">Nom</span> {{ $user->nom }}</p>
            <p><span class="font-bold">Prénom</span> {{ $user->prenom }}</p>
            <p><span class="font-bold">E-mail</span> {{ $user->email }}</p>
            <p><span class="font-bold">Rôle</span> {{ $user->role }}</p>
            {{--  if table profile is fill with auser data show his data --}}
            @if ($id)
                <p><span class="font-bold">Date de naissance</span> {{ $profile->date_de_naissance }}</p>
                <p><span class="font-bold">Téléphone</span> {{ $profile->telephone }}</p>
                <p><span class="font-bold">Adresse</span> {{ $profile->adresse }}</p>
                <p><span class="font-bold">Localite</span> {{ $localite->npa." ".$localite->nom }}</p>
                <p><span class="font-bold">Adresse</span> {{ $profile->adresse }}</p>
                <p><span class="font-bold">Formation</span> {{ $formation->nom }}</p>
                <p><span class="font-bold">Langue Maternelle</span> {{ $langue->nom }}</p>
                <p class="capitalize"><span class="font-bold">Responsable Nom</span> {{ $profile->responsable_nom }}</p>
                <p class="capitalize"><span class="font-bold">Responsable Prénom</span> {{ $profile->responsable_prenom }}</p>
                <p><span class="font-bold">Responsable Téléphone</span> {{ $profile->responsable_telephone }}</p>
                <p><span class="font-bold">Responsable E-mail</span> {{ $profile->responsable_email }}</p>
                <p><span class="font-bold">Remarque</span> {{ $profile->remarque }}</p>
                <p><span class="font-bold">Remarque Confidentielle</span> {{ $profile->confident_remarque }}
            @endif
            {{-- show this only if the connected is Direction --}}
            @if (auth()->user()->role == 'Direction')
            {{-- l'adresse IP, l'heure et la date de la dernière connexion de chaque utilisateur devront être --}}
            <div class="py-12">
                @if (!$new_user)
                    
                <p><span class="font-bold ">Dernière connexion</span> {{ $user_log->adresse_ip }} 
                    <span class="text-xs italic font-bold">{{ $user_log->updated_at}}</span>
                </p>
                @endif
                @if ( ($id))                   
                <p><span class="font-bold ">Remarque Confidentielle par la direction</span> {{ $profile->confident_remarque_direction }} </p>
                @endif
            </div>
          
              @endif

            <div class="flex">
                 {{-- by cliquez this send as to the users.edit with the user id--}}
                <div class="pt-4 pr-7">
                    <a class href="{{ route('users.edit',['user'=>$user]) }}">
                        <button type="submit" class="bg-blue-400 text-white px-6 py-3 rounded font-medium"> Modifier l'utilisateur
                        </button>
                    </a>
                </div>
                @if ($id)
                <div class="pt-4 pl-7">
                    {{-- the newprofile is the user id that came from the showfunction the UserController --}}
                    <a href="{{ route('profiles.edit',['profile'=>$id]) }}">
                        <button type="submit" class="bg-blue-400 text-white px-6 py-3 rounded font-medium"> Modifier le profil
                        </button>
                    </a>
                </div>
                @else
                 {{-- if table profile is empty send as to the profile create with his id --}}
                <div class="pt-4 pl-7">
                    <a class href="{{ route('profiles.create',['user'=>$user]) }}">
                        <button type="submit" class="bg-blue-400 text-white px-6 py-3 rounded font-medium"> Ajouter le profil
                        </button>
                    </a>
                </div>
                @endif
            </div>


            @if (auth()->user()->role == 'Direction')
           <form action="{{ route('users.destroy',['user'=>$user]) }}" method="POST">
            @csrf
            @method('DELETE')
                <div class="pt-7">
                    <button type="submit" class="bg-red-700 text-white px-6 py-3 rounded font-medium ">
                        Supprimer l'utilisateur
                    </button>
                </div>
           </form>
           @endif
        </div>
    </div>
@endsection
