{{-- 
    File name       : create.blade.php
    Begin           : 2021-03-11
    Last Update     : 2021-03-12

    Description     : form for create a new user

    Author          :Tesfazghi  robiel 
--}}
{{-- link to our main page layouts.app.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
          {{-- send to the user.store function if submit  --}}
          <form action="{{ route('users.store') }}" method="post">
            @csrf{{-- crose site request forger protection from XSS --}}

             {{--  @enderror => display error message in the input is not validate 
            old => display your alredy fille data--}}
            
            <div class="mb-4">
                <label for="nom" class="sr-only">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('nom') border-red-500 @enderror" value="{{old('nom')}}">
                @error('nom')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message}}
                    </div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="prenom" class="sr-only">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('prenom') border-red-500 @enderror" value="{{old('prenom')}}">
                @error('prenom')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message}}
                    </div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="role" class="sr-only">Rôle</label>
                <select class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('role') border-red-500 @enderror" value="{{old('role')}}" name="role" id="role">
                <option value="Client" selected>Client</option>
                <option value="Operateur">Opérateur</option>
                <option value="Administration">Administration</option>
                <option value="Direction">Direction</option>
                </select>
                @error('role')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message}}
                    </div>
                @enderror
              </div>
            <div class="mb-4">
              <label for="email" class="sr-only">E-mail</label>
              <input type="text" name="email" id="email" placeholder="E-mail" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
              @error('email')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
              @enderror
            </div>
            <div class="mb-4">
              <label for="password" class="sr-only">Mot de passe</label>
              <input type="password" name="password" id="password" placeholder="Mot de passe" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
              @error('password')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
              @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Enregistrer</button>
          </div>
          </form>
        </div>
    </div>
@endsection
