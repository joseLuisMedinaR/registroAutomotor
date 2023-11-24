<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="backdrop-blur-lg mx-auto bg-opacity-80 rounded-lg shadow-lg p-5 bg-gray-900 text-white">
                    <h1 class="text-3xl font-bold pb-5">Datos de la Infracción</h1>
                    <form>
                        <div class="mb-4">
                            <label for="titular" class="block mb-2 text-xl font-semibold">Titular</label>
                            <input type="text" id="titular" name="titular"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" value="{{ ucwords($titular->apellido) . ', ' . ucwords($titular->nombre) }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="dni" class="block mb-2 text-xl font-semibold">DNI</label>
                            <input type="text" id="dni" name="dni"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" value="{{ $titular->dni }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="marca" class="block mb-2 text-xl font-semibold">Marca</label>
                            <input type="text" id="marca" name="marca"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" value="{{ucwords($auto->marca)}}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="modelo" class="block mb-2 text-xl font-semibold">Modelo</label>
                            <input type="text" id="modelo" name="modelo"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" value="{{ucwords($auto->modelo)}}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="patente" class="block mb-2 text-xl font-semibold">Patente</label>
                            <input type="text" id="patente" name="patente"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" value="{{ strtoupper($auto->patente) }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="fecha" class="block mb-2 text-xl font-semibold">Fecha</label>
                            <input id="fecha" name="fecha"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" value="{{$infraccion->fecha}}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="block mb-2 text-xl font-semibold">Descripción</label>
                            <textarea id="descripcion" name="descripcion"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full" style="resize: none" disabled>{{$infraccion->descripcion}}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="tipo" class="block mb-2 text-xl font-semibold">Tipo de Multa</label>
                            <input id="fecha" name="fecha"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" value="{{strtoupper($infraccion->tipo)}}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="created_at" class="block mb-2 text-xl font-semibold">Fecha y Hora de Alta</label>
                            <input type="text" id="created_at" name="created_at"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                value="{{ \Carbon\Carbon::parse($infraccion->created_at)->format('d-m-Y   H:i:s') }}"
                                disabled>
                        </div>
                        <div class="mb-4">
                            <label for="created_at" class="block mb-2 text-xl font-semibold">Fecha y Hora de Actualización</label>
                            <input type="text" id="created_at" name="created_at"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                value="{{ \Carbon\Carbon::parse($infraccion->updated_at)->format('d-m-Y   H:i:s') }}"
                                disabled>
                        </div>
                        <div>
                            <p class="text-red-500 pb-5"></p>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <button onclick="goBack()"
                            class="text-white bg-sky-800 hover:bg-cyan-500 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-xl py-2.5 px-5 w-full sm:w-auto shadow-sm shadow-white">
                                Regresar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>        
</x-app-layout>

<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->