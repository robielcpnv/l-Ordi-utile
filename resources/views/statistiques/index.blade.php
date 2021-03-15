{{--
    File name       : index.blade.php
    Begin           : 2021-03-12
    Last Update     : 2021-03-15

    Description     : statque page

    Author          :Tesfazghi  robiel
--}}
{{-- link to our main page layouts.app.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div>
                <ul class="font-bold text-3xl p-6 bg-white flex justify-between mb-6 md:p-8 ">
                    <li><a href="{{ route('statistiques.age') }}">Âge</a></li>
                    <li><a href="{{ route('statistiques.domicile') }}">Domicile</a></li>
                    <li><a href="{{ route('statistiques.formation') }}">Formation</a></li>
                </ul>
            </div>
            @yield('chart')

        </div>
    </div>

@endsection
