@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
       

          <form action="{{ route('profile') }}" method="post">
            @csrf
      
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="nom">
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" type="text" placeholder="nom">
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label for="prenom">
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prenom" type="text" placeholder="prenom">
              </div>
            </div>
      
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3 mb-6">
                <label for="email"></label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" placeholder="email">
              </div>
              <div class="w-full px-3 mb-6">
                <label for="password"></label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
              </div>
              <div class="w-full px-3">
                <label for="password"></label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="naissance">
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="naissance" type="date" >
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label for="tel">
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tel" type="tel" placeholder="Téléphone">
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="adress">
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="adresse" type="text" placeholder="adresse">
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="npa">
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="npa" type="text" placeholder="NPA">
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="ville">
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="ville" type="text" placeholder="ville">
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="formation">
                 formation
                </label>
                <div class="relative ">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option>----</option>
                    <option>Elève</option>
                    <option>Etudiant</option>
                    <option>Stagiaire</option>
                    <option>Apprenti</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>
              </div>
              <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="formation">
                  genre
                 </label>
                 <div class="flex flex-wrap">
                  <div class="w-full md:w-1/3 p-3 mb-6 md:mb-0">
                    <label class="inline-flex items-center">
                      <input type="radio" class="form-radio" name="m" value="m">
                      <span class="ml-2">Masculin</span>
                    </label>
                    
                  </div>
                  <div class="w-full md:w-1/3 p-3 mb-6 md:mb-0">
                    <label class="inline-flex items-center ml-6">
                      <input type="radio" class="form-radio" name="f" value="f">
                      <span class="ml-2">Feminin</span>
                    </label>
                  </div>
                 </div>
                
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="formation">
                 titre
                </label>
                <div class="relative ">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option>----</option>
                    <option>Madame</option>
                    <option>Monsieur</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>
              </div>
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="formation">
                 langue
                </label>
                <div class="relative ">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option>----</option>
                    <option>France</option>
                    <option>Anglais</option>
                    <option>Allemand</option>
                    <option>Italie</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>
              </div>
            </div>
           <div class="border-b-2 border-gray-300 text-center mb-6 p-4"> Responsable</div>
           <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="responsable_nom">
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="responsable_nom" type="text" placeholder="nom">
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label for="responsable_prenom">
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="responsable_prenom" type="text" placeholder="prenom">
            </div>
          </div>
      
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6">
              <label for="responsable_email"></label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="responsable_email" placeholder="email">
            </div>
            <div class="w-full px-3 mb-6">
              <label for="responsable_tel"></label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tel" type="responsable_tel" placeholder="Téléphone">
            </div>     
            <div class="flex justify-center w-screen">
              <button type="submit" class="bg-green-400 text-white px-12 py-4 rounded font-medium ">
                Sauvegarder
            </button>
            </div>
          </div>
          
          
          </form>

        </div>
    </div>
@endsection