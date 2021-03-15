{{-- 
    File name       : edit.blade.php
    Begin           : 2021-03-11
    Last Update     : 2021-03-15

    Description     : form for modifie the user 

    Author          :Tesfazghi  robiel 
--}}
{{-- link to our main page layouts.app.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
          {{-- send to the users.update function if submit --}}
          <form action="{{ route('users.update',['user' => $user]) }}" method="post">
            @csrf{{-- crose site request forger protection from XSS --}}
           {{--  for update we have to use PATCH/PUT since method only know get/post we pass them as laravel function --}}
            @method('PATCH')

            {{--  @enderror => display error message in the input is not validate 
                  old => display your alredy fille data ?? Or from database if existe
            --}}

            <div class="mb-4">
                <label for="nom" class="sr-only">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="nom" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('nom') border-red-500 @enderror" value="{{old('nom') ?? $user->nom}}">
                @error('nom')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message}}
                    </div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="prenom" class="sr-only">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="prenom" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('prenom') border-red-500 @enderror" value="{{old('prenom') ?? $user->prenom}}">
                @error('prenom')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message}}
                    </div>
                @enderror
              </div>
              <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choisir un nouveau mot de passe" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">

                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Password again</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Répétez votre mot de passe" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" value="">

                @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
              
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Enregistrer</button>
          </div>
          </form>
        </div>
    </div>
@endsection
