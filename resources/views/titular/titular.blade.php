<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="backdrop-blur-lg mx-auto bg-opacity-80 rounded-lg shadow-lg p-5 bg-gray-900 text-white">
                    <h1 class="text-3xl font-bold pb-5">Datos del Titular</h1>
                    <form autocomplete="off">
                        <div class="mb-4">
                            <label for="apellido" class="block mb-2 text-xl font-semibold">Apellido</label>
                            <input type="text" id="apellido" name="apellido"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                value="{{ $titular->apellido }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="nombre" class="block mb-2 text-xl font-semibold">Nombre</label>
                            <input type="text" id="nombre" name="nombre"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                value="{{ $titular->nombre }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="dni" class="block mb-2 text-xl font-semibold">Documento Nacional de
                                Identidad</label>
                            <input type="text" id="dni" name="dni"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                value="{{ $titular->dni }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="domicilio" class="block mb-2 text-xl font-semibold">Domicilio</label>
                            <input type="text" id="domicilio" name="domicilio"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                value="{{ $titular->domicilio }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="created_at" class="block mb-2 text-xl font-semibold">Fecha y Hora de Alta</label>
                            <input type="text" id="created_at" name="created_at"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                value="{{ \Carbon\Carbon::parse($titular->created_at)->format('d-m-Y   H:i:s') }}"
                                disabled>
                        </div>
                        <div class="mb-4">
                            <label for="created_at" class="block mb-2 text-xl font-semibold">Fecha y Hora de Actualización</label>
                            <input type="text" id="created_at" name="created_at"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
                                value="{{ \Carbon\Carbon::parse($titular->updated_at)->format('d-m-Y   H:i:s') }}"
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
