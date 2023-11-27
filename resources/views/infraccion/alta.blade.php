<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="backdrop-blur-lg mx-auto bg-opacity-80 rounded-lg shadow-lg p-5 bg-gray-900 text-white">
                    <h1 class="text-3xl font-bold pb-5">Nuevo Infracción</h1>
                    <form action="{{ route('infraccion.store') }}" method="POST" name="alta" id="alta">
                        @csrf
                        <input type="hidden" name="_token" value={{ csrf_token() }}>
                        <div class="mb-4">
                            <label for="auto" class="block mb-2 text-xl font-semibold">Patente</label>
                            <select id="auto_id" name="auto_id"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                required>
                                <option value="">Seleccione una patente</option>
                                @foreach ($autos as $auto)
                                    <option value="{{ trim($auto->id) }}">
                                        {{ strtoupper($auto->patente) }}</option>
                                @endforeach
                            </select>
                            @error('auto_id')
                                <div class="text-xl font-semibold">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fecha" class="block mb-2 text-xl font-semibold">Fecha</label>
                            <input type="date" id="fecha" name="fecha"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                required value="{{ old('fecha') }}">
                            @error('Fecha')
                                <div class="text-xl font-semibold">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="block mb-2 text-xl font-semibold">Descripción</label>
                            <textarea id="descripcion" name="descripcion"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full"
                                rows=10 placeholder="Ingrese la descripción" required style="resize: none">{{ old('descripcion') }}</textarea>
                            @error('Descripción')
                                <div class="text-xl font-semibold">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tipo" class="block mb-2 text-xl font-semibold">Tipo de Multa</label>
                            <select name="tipo" id="tipo" name="tipo"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                required>
                                <option value="">Seleccione el tipo de multa</option>
                                @foreach ($tiposInfracciones as $tipo)
                                    <option value="{{ $tipo }}">{{ strtoupper($tipo) }}</option>
                                @endforeach
                            </select>
                            @error('tipo')
                                <div class="text-xl font-semibold">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <p class="text-red-500 pb-5"></p>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <button type="submit"
                                class="text-white bg-sky-800 hover:bg-cyan-500 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-xl py-2.5 px-5 w-full sm:w-auto shadow-sm shadow-white">
                                Registrar
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
            document.getElementById("alta").reset();
            window.history.back();
        }
    </script>
</x-app-layout>

<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->
