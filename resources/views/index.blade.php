@extends('layouts.template')
@section('title')
    <title>Sistema de Control de Infracciones del Automotor</title>
@endsection

@section('content')
    <div class="relative py-10 sm:max-w-xl sm:mx-auto">
        <div
            class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
        </div>
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

            <div class="max-w-md mx-auto">
                <div class="container mx-auto">
                    <div class="grid grid-col-4">
                        <div class="flex justify-center">
                            <a href="{{ route('login') }}"
                                class="font-semibold text-cyan-600 hover:text-cyan-200 dark:text-cyan-600 dark:hover:text-sky-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <img src="img/cabecera.png" alt="Registro de Infractores on line">
                            </a>
                        </div>
                        <div class="flex justify-center items-center p-5">
                            <div class="border shadow-teal-300 shadow-md max-w-2xl p-6 rounded-lg dark:text-gray-300">
                                <h1 style="font-size: 3em">Bienvenido al Sistema de Registro de Infracciones</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection