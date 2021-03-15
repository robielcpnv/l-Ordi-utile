{{--
    File name       : create.blade.php
    Begin           : 2021-03-09
    Last Update     : 2021-03-15

    Description     : form for create a profile

    Author          :Tesfazghi  robiel
--}}
{{-- link to our main page layouts.app.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
          

          {{-- send to the profiles.store function if submit && enctype is if you want to add file to form --}}
          <form action="{{ route('profiles.store') }}" method="post" enctype="multipart/form-data">
            @csrf{{-- crose site request forger protection from XSS --}}

            {{--  @enderror => display error message in the input is not validate 
            old => display your alredy fille data--}}

            {{-- let pass the user email to our profile --}}
            <input type="hidden" name="email" id="email" value="{{ $email }}">

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="date_de_naissance">
                  date de naissance
                 </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('date_de_naissance') border-red-500 @enderror" value="{{old('date_de_naissance')}}" id="date_de_naissance" name="date_de_naissance" type="date" >
                @error('date_de_naissance')
                <div class="text-red-500 mt-2 text-sm">
                  {{ $message}}
                </div>
                @enderror
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="telephone">
                  telephone
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('telephone') border-red-500 @enderror" value="{{old('telephone')}}"" id="telephone" name="telephone" type="tel" placeholder="Téléphone">
                @error('telephone')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
              @enderror
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="adresse">
                  adresse
                 </label>
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('adresse') border-red-500 @enderror" value="{{old('adresse')}}"" id="adresse" name="adresse" type="text" placeholder="adresse">
                @error('adresse')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
                @enderror
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="localite_id">
                  localite
                 </label>
                </label>
                <div class="relative ">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('localite_id') border-red-500 @enderror" value="{{old('localite_id')}}"" id="localite_id" name="localite_id">
                    <option>----</option>
                   @foreach ($localites as $localite)
                   <option value="{{ $localite->id }}">{{ $localite->npa  }} {{ $localite->nom }}</option>
                   @endforeach
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  @error('localite_id')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="formation_id">
                 formation
                </label>
                <div class="relative ">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('formation_id') border-red-500 @enderror" value="{{old('formation_id')}}"" id="formation_id" name="formation_id">
                    <option>----</option>
                    @foreach ($formations as $formation)
                        <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                    @endforeach
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  @error('formation_id')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titre">
                 titre
                </label>
                <div class="relative ">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('titre') border-red-500 @enderror" value="{{old('titre')}}"" id="titre" name="titre">
                    <option>----</option>
                    <option value="Madame">Madame</option>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Autre">Autre</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  @error('titre')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="langue_id">
                  langue maternelle
                </label>
                <div class="relative ">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('langue_id') border-red-500 @enderror" value="{{old('langue_id')}}"" id="langue_id" name="langue_id">
                    @foreach ($langues as $langue)
                    <option value="{{ $langue->id }}">{{ $langue->nom }}</option>
                    @endforeach

                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  @error('langue_id')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="flex flex-wrap justify-center -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="text-center block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                    photo
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('image') border-red-500 @enderror" value="{{old('image')}}" id="image" name="image" type="file">
                  @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message}}
                    </div>
                    @enderror
                </div>
              </div>

            <div class="border-b-2 border-gray-300 font-bold text-center mb-6 p-4">
              Responsable
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="responsable_nom">
                  Nom
                 </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('responsable_nom') border-red-500 @enderror" value="{{old('responsable_nom')}}" id="responsable_nom" name="responsable_nom" type="text" placeholder="Nom">
                @error('responsable_nom')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
              @enderror
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="responsable_prenom">
                  Prenom
                 </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('responsable_prenom') border-red-500 @enderror" value="{{old('responsable_prenom')}}" id="responsable_prenom" name="responsable_prenom" type="text" placeholder="Prénom">
                @error('responsable_prenom')
                    <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                    </div>
                @enderror
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="responsable_email">
                  e-mail
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('responsable_email') border-red-500 @enderror" value="{{old('responsable_email')}}"" id="responsable_email" name="responsable_email" type="email" placeholder="E-mail">
                @error('responsable_email')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
                @enderror
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="responsable_telephone">
                  telephone
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('responsable_telephone') border-red-500 @enderror" value="{{old('responsable_telephone')}}"" id="responsable_telephone" name="responsable_telephone" type="tel" placeholder="Téléphone">
                @error('responsable_telephone')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message}}
                  </div>
              @enderror
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="remarque">
                  Remarque / message
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{old('remarque')}}" name="remarque" id="remarque" cols="30" rows="10"></textarea>
              </div>
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="confident_remarque">
                  remarque confidentielle
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{old('confident_remarque')}}" name="confident_remarque" id="confident_remarque" cols="30" rows="10"></textarea>
              </div>
            </div>
            {{-- show this only if the connected is Direction --}}
            @if (auth()->user()->role == 'Direction')
              <div class="flex flex-wrap justify-center -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="confident_remarque_direction">
                    Remarque Confidentielle par la direction
                  </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="confident_remarque_direction" id="confident_remarque_direction" cols="30" rows="10">{{old('confident_remarque_direction') ?? $profile->confident_remarque_direction}}</textarea>
                </div>
              </div>
            @endif
            <div class="flex justify-center">
              <button type="submit" class="bg-green-400 text-white px-12 py-4 rounded font-medium ">
                Enregistrer
              </button>
            </div>

          </form>

        </div>
    </div>
@endsection
