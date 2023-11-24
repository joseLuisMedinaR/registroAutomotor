<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="backdrop-blur-lg mx-auto bg-opacity-80 rounded-lg shadow-lg p-5 bg-gray-900 text-white">
                    <h1 class="text-3xl font-bold pb-5">Editar Auto</h1>
                    <form action="{{ route('auto.update', ['id' => $auto->id]) }}" method="POST" autocomplete="off" name="editar" id="editar">
                        @csrf
                        {{method_field('PUT')}}
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <input type="hidden" name="id" value="{{$auto->id}}">
                        <div class="mb-4">
                            <label for="titular" class="block mb-2 text-xl font-semibold">Titular</label>
                            <select id="titular_id" name="titular_id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" required>
                                <option value="">Seleccione un titular</option>
                                @foreach ($titulares as $titular)
                                    <option value="{{ $titular->id }}" @if ($titular->id == $titularPorDefecto->id) selected @endif>
                                        {{ ucwords($titular->apellido) . ', ' . ucwords($titular->nombre) }}
                                    </option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="mb-4">
                            <label for="marca" class="block mb-2 text-xl font-semibold">Marca</label>
                            <input type="text" id="marca" name="marca"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" required value="{{ $auto->marca}}">
                        </div>
                        <div class="mb-4">
                            <label for="modelo" class="block mb-2 text-xl font-semibold">Modelo</label>
                            <input type="text" id="modelo" name="modelo"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" required value="{{ $auto->modelo}}">
                        </div>
                        <div class="mb-4">
                            <label for="patente" class="block mb-2 text-xl font-semibold">Patente</label>
                            <input type="text" id="patente" name="patente"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" required value="{{ $auto->patente}}">
                        </div>
                        <div class="mb-4">
                            <label for="tipo" class="block mb-2 text-xl font-semibold">Tipo de Vehículo</label>
                            <select name="tipo" id="tipo" name="tipo"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                required>
                                <option value="">Seleccione el tipo de vehículo</option>
                                @foreach ($tiposAutos as $tipo)
                                    <option value="{{ $tipo }}" @if ($tipo == $auto->tipo) selected @endif>{{ strtoupper($tipo) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <p class="text-red-500 pb-5"></p>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <button type="submit"
                            class="text-white bg-sky-800 hover:bg-cyan-500 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-xl py-2.5 px-5 w-full sm:w-auto shadow-sm shadow-white">
                                Guardar
                            </button>
                            <button onclick="limpiarFormulario()"
                            class="text-white bg-red-500 hover:bg-red-700 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-xl py-2.5 px-5 w-full sm:w-auto shadow-sm shadow-white">
                                Cancelar
                            </button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function limpiarFormulario() {
            document.getElementById("editar").reset();
            window.history.back();
        }
    </script>
</x-app-layout>

<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->