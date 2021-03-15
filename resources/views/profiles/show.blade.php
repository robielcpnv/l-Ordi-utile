{{--
    File name       : compte.blade.php
    Begin           : 2021-03-09
    Last Update     : 2021-03-15

    Description     : show the profile of a user

    Author          :Tesfazghi  robiel
--}}
{{-- link to our main page layouts.app.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="font-bold capitalize text-3xl pb-4">{{ auth()->user()->nom}} {{auth()->user()->prenom }}</h1>

            <div class="flex justify-between pb-5">
                {{-- show image if it existe in the profile table --}}
                
                @if ($profile)
                    <img src="{{ asset('storage/'.$profile->image) }}" class="w-48 h-48 rounded-full" alt="photo">
                @endif
                {{-- add QRcode of our url --}}
                {!! QrCode::backgroundColor(127, 127, 173)->color(5, 5, 31)
                    ->size(170)->generate(Request::fullUrl()); !!}
            </div>

            <p class="capitalize rounded-"><span class="font-bold">Nom</span> {{ auth()->user()->nom }}</p>
            <p class="capitalize"><span class="font-bold">Prénom</span> {{ auth()->user()->prenom }}</p>
            <p><span class="font-bold">Titre</span> {{ auth()->user()->role }}</p>
            <p><span class="font-bold">E-mail</span> {{ auth()->user()->email }}</p>
            <p><span class="font-bold">Rôle</span> {{ auth()->user()->role }}</p>
           {{--  if table profile is fill with auser data show his data --}}
            @if ($profile != null)

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
                <p><span class="font-bold">Remarque Confidentielle</span> {{ $profile->confident_remarque }}</p>

                <div class="pt-4 pl-7">
                    {{-- if table profile is fill with a user data send us to the profile edit with his id --}}
                    <a href="{{ route('profiles.edit',['profile'=>$profile->id]) }}">
                        <button type="submit" class="bg-blue-400 text-white px-6 py-3 rounded font-medium"> Modifier le profil
                        </button>
                    </a>
                </div>
                @else
                <div class="pt-4 pr-7">
                    {{-- if table profile is empty send us to the profile create with his id --}}
                    <a class href="{{ route('profiles.create',['user'=>auth()->user()->id]) }}">
                        <button type="submit" class="bg-blue-400 text-white px-6 py-3 rounded font-medium"> Ajouter le profil
                        </button>
                    </a>
                </div>

            @endif

        </div>
    </div>
@endsection
