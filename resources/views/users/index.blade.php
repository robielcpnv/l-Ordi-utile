{{--
    File name       : index.blade.php
    Begin           : 2021-03-11
    Last Update     : 2021-03-15

    Description     : show the list of user

    Author          :Tesfazghi  robiel
--}}
{{-- link to our main page layouts.app.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="flex flex-col w-8/12 bg-white p-6 rounded-lg ">
            {{-- show this only if the connected is Direction --}}
            @if (auth()->user()->role == 'Direction')
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-1/3 mb-7">
                  <a href="{{ route('users.create') }}">Ajouter utilisateur</a>
                </button>
            </div>
            @endif
            <div class="pb-7">
                <table class="table-fixes border-collapse ">
                <thead>
                    <tr>
                    <th class="w-1/6 border border-gray-200">Id</th>
                    <th class="w-1/6 border border-gray-200">Nom</th>
                    <th class="w-1/6 border border-gray-200">Prénom</th>
                    <th class="w-1/3 border border-gray-200">E-mail</th>
                    <th class="w-1/3 border border-gray-200">Rôle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="border border-gray-200 text-center">
                            <a href="{{ route('users.show', ['user' => $user] ) }}">
                                {{ $user->id }}
                            </a>
                        </td>
                        <td class="border border-gray-200 text-center">
                            <a href="{{ route('users.show', ['user' => $user] ) }}">
                                {{ $user->nom }}
                            </a>
                        </td>
                        <td class="border border-gray-200 text-center">
                            <a href="{{ route('users.show', ['user' => $user] ) }}">
                                {{ $user->prenom }}
                            </a>
                        </td>
                        <td class="border border-gray-200 text-center">
                            <a href="{{ route('users.show', ['user' => $user] ) }}">
                                {{ $user->email }}
                            </a>
                        </td>
                        <td class="border border-gray-200 text-center">
                        <a href="{{ route('users.show', ['user' => $user] ) }}">
                            {{ $user->role }}
                            </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
           <div>
            {{ $users->links() }}
           </div>
        </div>
    </div>
@endsection
