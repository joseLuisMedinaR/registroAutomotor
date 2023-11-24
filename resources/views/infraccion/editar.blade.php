<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="backdrop-blur-lg mx-auto bg-opacity-80 rounded-lg shadow-lg p-5 bg-gray-900 text-white">
                    <h2 class="text-2xl font-bold pb-5">Editar Infracción</h2>
                    <form action="{{ route('infraccion.update', ['id' => $infraccion->id]) }}" method="POST" autocomplete="off" name="editar" id="editar">
                        @csrf
                        {{method_field('PUT')}}
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <input type="hidden" name="id" value="{{$infraccion->id}}">
                        <div class="mb-4">
                            <label for="auto" class="block mb-2 text-sm font-medium">Patente</label>
                            <select id="auto_id" name="auto_id"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                required>
                                <option value="">Seleccione una patente</option>
                                @foreach ($autos as $auto)
                                    <option value="{{ trim($auto->id) }}" @if ($infraccion->auto_id == $autoPorDefecto->id) selected @endif>
                                        {{ strtoupper($auto->patente) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="fecha" class="block mb-2 text-sm font-medium">Fecha</label>
                            <input type="date" id="fecha" name="fecha"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                required value="{{ $infraccion->fecha}}">
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="block mb-2 text-sm font-medium">Descripción</label>
                            <textarea id="descripcion" name="descripcion"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full"
                                rows=10 placeholder="Ingrese la descripción" required style="resize: none">{{ $infraccion->descripcion}}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="tipo" class="block mb-2 text-sm font-medium">Tipo de Multa</label>
                            <select name="tipo" id="tipo" name="tipo"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                required>
                                <option value="">Seleccione el tipo de multa</option>
                                @foreach ($tiposInfracciones as $tipo)
                                    <option value="{{ $tipo }}" @if ($tipo == $infraccion->tipo) selected @endif>{{ strtoupper($tipo) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <p class="text-red-500 pb-5"></p>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <button type="submit"
                                class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-5 w-full sm:w-auto">
                                Guardar
                            </button>
                            <button onclick="limpiarFormulario()"
                                class="text-white bg-red-500 hover:bg-red-700 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-5 w-full sm:w-auto">
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