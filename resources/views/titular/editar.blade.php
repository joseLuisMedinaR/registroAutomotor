<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="backdrop-blur-lg mx-auto bg-opacity-80 rounded-lg shadow-lg p-5 bg-gray-900 text-white">
                    <h1 class="text-3xl font-bold pb-5">Editar Titular</h1>
                    <form action="{{ route('titular.update', ['id' => $titular->id]) }}" method="POST" autocomplete="off" name="editar" id="editar">
                        @csrf
                        {{method_field('PUT')}}
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <input type="hidden" name="id" value="{{$titular->id}}">
                        <div class="mb-4">
                            <label for="apellido" class="block mb-2 text-xl font-semibold">Apellido</label>
                            <input type="text" id="apellido" name="apellido"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" required value="{{ $titular->apellido }}">
                        </div>
                        <div class="mb-4">
                            <label for="nombre" class="block mb-2 text-xl font-semibold">Nombre</label>
                            <input type="text" id="nombre" name="nombre"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" required value="{{ $titular->nombre }}">
                        </div>
                        <div class="mb-4">
                            <label for="dni" class="block mb-2 text-xl font-semibold">Documento Nacional de
                                Identidad</label>
                            <input type="text" id="dni" name="dni"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" required value="{{ $titular->dni }}">
                        </div>
                        <div class="mb-4">
                            <label for="domicilio" class="block mb-2 text-xl font-semibold">Domicilio</label>
                            <input type="text" id="domicilio" name="domicilio"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4" required value="{{ $titular->domicilio }}">
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