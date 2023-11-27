<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->

<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('infraccion.create') }}">
            <div style="max-width: 240px;"
                class="flex rounded-full bg-gradient-to-tr from-violet-400 to-green-400 p-1 shadow-lg">
                <button class="flex-1 font-bold md:text-xl bg-white rounded-full">
                    Nueva Infracción
                </button>
            </div>
        </a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 overflow-auto">
                    <h2 class="text-2xl font-bold mb-4">Listado de Infracciones</h2>
                    <table id="example"
                        class="order-column table-auto w-full shadow-lg shadow-blue-500/50 rounded-lg overflow-hidden px-5 py-5">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 p-3 text-sm tracking-wide text-left"># ID</th>
                                <th class="px-4 py-2 p-3 text-sm tracking-wide text-left"># ID Auto</th>
                                <th class="px-4 py-2 p-3 text-sm tracking-wide text-left">Patente</th>
                                <th class="px-4 py-2 p-3 text-sm tracking-wide text-left">Fecha</th>
                                <th class="px-4 py-2 p-3 text-sm tracking-wide text-left">Descripción</th>
                                <th class="px-4 py-2 p-3 text-sm tracking-wide text-left">Tipo</th>
                                <th class="px-4 py-2 p-3 text-sm tracking-wide text-left">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forEach($infraccion as $infracciones)
                            <tr>
                                <td class="border px-4 py-2 p-3 text-sm">{{$infracciones->id}}</td>
                                <td class="border px-4 py-2 p-3 text-sm">{{$infracciones->auto_id}}</td>
                                <td class="border px-4 py-2 p-3 text-sm">{{strtoupper($infracciones->auto->patente)}}</td>
                                <td class="border px-4 py-2 p-3 text-sm">{{$infracciones->fecha}}</td>
                                <td class="border px-4 py-2 p-3 text-sm">{{$infracciones->descripcion}}</td>
                                <td class="border px-4 py-2 p-3 text-sm">{{strtoupper($infracciones->tipo)}}</td>
                                <td class="border px-4 py-2 p-3 text-sm" style="width: 10px">
                                    <div class="flex justify-center items-center rounded-full mx-auto" style="width: fit-content; padding: 0 12px;">
                                        <div class="mr-2">
                                            <a href="{{ route('infraccion.show', $infracciones->id) }}">
                                                <button class="font-bold md:text-xl bg-green-500 rounded-full text-white flex items-center px-4 py-1 hover:bg-lime-600">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                          <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                          <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                                                        </g>
                                                      </svg>
                                                    <span>&nbsp;&nbsp;Ver</span>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="mx-2">
                                            <a href="{{ route('infraccion.edit', $infracciones->id) }}">
                                                <button class="font-bold md:text-xl bg-blue-600 rounded-full text-white flex items-center px-4 py-1 hover:bg-blue-800">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v3m5-3v3m5-3v3M1 7h7m1.506 3.429 2.065 2.065M19 7h-2M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm6 13H6v-2l5.227-5.292a1.46 1.46 0 0 1 2.065 2.065L8 16Z"/>
                                                    </svg>
                                                    <span>Editar</span>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="mx-2"> 
                                            <button class="font-bold md:text-xl bg-red-500 rounded-full text-white flex items-center px-4 py-1 hover:bg-red-800" onclick="openModal('modelConfirm')">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                                </svg>
                                                <span>&nbsp;&nbsp;Eliminar</span>
                                            </button>
                                    </div>                                            
                                </div>
                            </td>
                        </tr>
                        <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                        
                                <div class="flex justify-end p-2">
                                    <button onclick="closeModal('modelConfirm')" type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                        
                                <div class="p-6 pt-0 text-center">
                                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Está seguro de querer eliminar este registro ?</h3>
                                    <a href="" onclick="deleteInfraccion('{{ $infracciones->id }}', 'modelConfirm')" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                        Si, eliminar
                                    </a>                                            
                                    <a href="" onclick="closeModal('modelConfirm')"
                                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                        data-modal-toggle="delete-user-modal">
                                        No, cancelar
                                    </a>
                                </div>
                        
                            </div>
                        </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

                <style>
                    #example_length select {
                        width: 60px;
                    }
                </style>

                <script>
                    new DataTable('#example', {
                        language: {
                            info: 'Mostrando página _PAGE_ de _PAGES_',
                            infoEmpty: 'No hay registros disponibles.',
                            infoFiltered: '(filtrado de _MAX_ registros totales)',
                            lengthMenu: 'Mostrando _MENU_ registros por página',
                            zeroRecords: 'No se encontraron registros',
                            search: 'Buscar:',
                            loadingRecords: 'Buscando...',
                            paginate: {
                                'first': 'Primerao',
                                'last': 'Última',
                                'next': 'Siguiente',
                                'previous': 'Anterior'
                            },
                            emptyTable: 'No hay datos disponibles.',
                        },
                        order: [
                            [1, 'asc']
                        ],
                        columnDefs: [{
                                target: 0,
                                visible: false,
                                searchable: false
                            },
                            {
                                target: 1,
                                visible: false,
                                searchable: false
                            },
                            {
                                target: 5,
                                searchable: false
                            }
                        ]
                    });
                </script>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.openModal = function(modalId) {
            document.getElementById(modalId).style.display = 'block'
            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
        }
    
        window.closeModal = function(modalId) {
            document.getElementById(modalId).style.display = 'none'
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
        }
    
        // Close all modals when press ESC
        document.onkeydown = function(event) {
            event = event || window.event;
            if (event.keyCode === 27) {
                document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                let modals = document.getElementsByClassName('modal');
                Array.prototype.slice.call(modals).forEach(i => {
                    i.style.display = 'none'
                })
            }
        };
        // Función para eliminar el registro
        function deleteInfraccion(infraccionId, modalId) {
   fetch('{{ route("infraccion.destroy", ":id") }}'.replace(':id', infraccionId), {
       method: 'DELETE',
       headers: {
           'Content-Type': 'application/json',
           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
       }
   })
   .then(response => {
       if (response.ok) {
           // Si la eliminación se realiza correctamente, cierra el modal y actualiza la tabla de infracciones
           closeModal(modalId); // Aquí se cierra el modal
           window.location.reload(); 
           document.getElementById(modalId).style.display = 'none'
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
       } else {
           console.error('Error al eliminar el registro');
       }
   })
   .catch(error => {
       console.error('Error:', error);
   });
}
    </script>
</x-app-layout>

<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->