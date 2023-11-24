<x-app-layout>
    <!-- PANTALLA DE BIENVENIDA Y EXPLICACION -->
    <div class="container relative flex flex-col justify-between h-full max-w-6xl px-10 mx-auto xl:px-0 mt-5">
        <div class="w-full">
            <div class="flex flex-col w-full mb-10 sm:flex-row">
                <div class="w-full mb-10 sm:mb-0 py-10">
                    <div class="relative h-full ml-0 mr-0 sm:mr-10">
                        <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-indigo-500 rounded-lg"></span>
                        <div class="relative h-full p-5 bg-white border-2 border-indigo-500 rounded-lg">
                            <div class="items-center text-center">
                                <h3 class="my-2 ml-3 font-extrabold text-gray-800 text-3xl sm:text-5xl"><span class=" text-indigo-600">{{ Auth::user()->name }}</span>, bienvenid@ al Sistema de Registro de Infracciones</h3>
                            </div>                            
                        </div>
                    </div>
                </div>                
            </div>
            <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-between">
                <div class="text-center">
                    <p class="mt-4 text-sm leading-7 text-gray-500 font-regular">
                        Instrucciones
                    </p>
                    <h3 class="text-3xl sm:text-5xl leading-normal font-extrabold tracking-tight text-gray-900">
                        Necesitas agregar una <span class="text-indigo-600"><a href="{{ route('infraccion.create') }}">Nueva
                                Infracción</a> ?</span>
                    </h3>
                </div>
            </div>            
            <div class="flex flex-col w-full mb-5 sm:flex-row py-14">
                <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
                    <div class="relative h-full ml-0 mr-0 sm:mr-10">
                        <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-blue-400 rounded-lg"></span>
                        <div class="relative h-full p-5 bg-white border-2 border-blue-400 rounded-lg">
                            <div class="flex-shrink-0 relative top-0 -mt-16">
                                <div
                                    class="flex items-center justify-center h-20 w-20 rounded-full bg-indigo-500 text-white border-4 border-white text-xl font-semibold">
                                    1
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4 class="text-lg leading-6 font-semibold text-gray-900">Si el <span
                                        class="text-indigo-500"><a href="{{ route('titular.index') }}">Titular</a></span> no
                                    está cargado
                                    en el Sistema</h4>
                                <p class="mt-2 text-base leading-6 text-gray-500">
                                    Presionar sobre la opción <span class="text-indigo-500"><a
                                            href="{{ route('titular.index') }}">Titulares</a></span> del Menú de navegación.
                                    Después de eso presionar
                                    sobre el botón <span class="text-indigo-500"><a
                                            href="{{ route('titular.create') }}">Nuevo Titular</a></span>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
                    <div class="relative h-full ml-0 mr-0 sm:mr-10">
                        <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-yellow-400 rounded-lg"></span>
                        <div class="relative h-full p-5 bg-white border-2 border-yellow-400 rounded-lg">
                            <div class="flex-shrink-0 relative top-0 -mt-16">
                                <div
                                    class="flex items-center justify-center h-20 w-20 rounded-full bg-indigo-500 text-white border-4 border-white text-xl font-semibold">
                                    2
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4 class="text-lg leading-6 font-semibold text-gray-900">Si el <span
                                        class="text-indigo-500"><a href="{{ route('auto.index') }}">Auto</a></span> no está
                                    cargado en
                                    el Sistema</h4>
                                <p class="mt-2 text-base leading-6 text-gray-500">
                                    Presionar sobre la opción <span class="text-indigo-500"><a
                                            href="{{ route('auto.index') }}">Autos</a></span> del Menú de navegación.
                                    Después de eso presionar
                                    sobre el botón <span class="text-indigo-500"><a href="{{ route('auto.create') }}">Nuevo
                                            Auto</a></span>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-1/2">
                    <div class="relative h-full ml-0 md:mr-10">
                        <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-green-500 rounded-lg"></span>
                        <div class="relative h-full p-5 bg-white border-2 border-green-500 rounded-lg">
                            <div class="flex-shrink-0 relative top-0 -mt-16">
                                <div
                                    class="flex items-center justify-center h-20 w-20 rounded-full bg-indigo-500 text-white border-4 border-white text-xl font-semibold">
                                    3
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4 class="text-lg leading-6 font-semibold text-gray-900">Listo, ya puedes cargar la
                                    <span class="text-indigo-500"><a href="{{ route('infraccion.create') }}">Nueva
                                            Infracción</a></span>
                                </h4>
                                <p class="mt-2 text-base leading-6 text-gray-500">
                                    Presionar sobre la opción <span class="text-indigo-500"><a
                                            href="{{ route('infraccion.index') }}">Infracciones</a></span> del Menú de
                                    navegación. Después de eso
                                    presionar sobre el botón <span class="text-indigo-500"><a
                                            href="{{ route('infraccion.create') }}">Nueva Infracción</a></span>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
