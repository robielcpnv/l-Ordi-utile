{{-- 
    File name       : ProfileController.php
    Begin           : 2021-03-01
    Last Update     : 2021-03-08

    Description     : home page 

    Author          :Tesfazghi  robiel 
--}}
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Bienvenue
        </div>

       <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
@endsection