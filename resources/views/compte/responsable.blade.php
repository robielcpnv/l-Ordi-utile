@extends('compte.index')
@section('profile')
    
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
   

      <form action="{{ route('profile') }}" method="post">
        @csrf
  
       
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