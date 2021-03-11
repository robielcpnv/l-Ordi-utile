@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="flex flex-col w-8/12 bg-white p-6 rounded-lg ">
          <div>
            <table class="table-fixes border-collapse mb-7">
              <thead>
                <tr>
                  <th class="w-1/6 border border-gray-200">Code Id</th>
                  <th class="w-1/4 border border-gray-200">Nom</th>
                  <th class="w-1/4 border border-gray-200">prenom</th>
                  <th class="w-1/3 border border-gray-200">email</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($profiles as $profile)
                  <tr>
                    <td class="border border-gray-200 text-center">                
                      <a href="{{ route('profiles.show', ['profile' => $profile] ) }}">
                        {{ $profile->id }}
                      </a>    
                    </td>    
                    <td class="border border-gray-200 pl-5">{{ $profile->nom }}</td>
                    <td class="border border-gray-200 pl-5">{{ $profile->prenom }}</td>
                    <td class="border border-gray-200">{{ $profile->email }}</td>             
                  </tr>  
                @endforeach
              </tbody>
            </table>
          </div>
        <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-1/3">
          <a href="{{ route('profiles.create') }}">add profile</a>
        </button>
      </div>
        </div>
    </div>
@endsection