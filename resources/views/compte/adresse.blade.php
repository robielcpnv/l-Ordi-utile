@extends('compte.index')
@section('profile')
    
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">
 

    <form action="{{ route('profile') }}" method="post">
      @csrf
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
      <div class="flex justify-center ">
        <button type="submit" class="bg-green-400 text-white px-12 py-4 rounded font-medium ">
          Sauvegarder
      </button>
      </div>
   

    </form>

  </div>
</div>
@endsection