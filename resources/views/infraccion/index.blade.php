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
                                    </div> 
                                </td>
                            </tr>
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
</x-app-layout>

<!--
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
 -->