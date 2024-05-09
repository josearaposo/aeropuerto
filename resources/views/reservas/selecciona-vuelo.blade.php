<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Codigo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        A.Origen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        A.Destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Compañia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Salida
                </th>
                    <th scope="col" class="px-6 py-3" >
                        Llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                            Plazas
                    </th>
                    <th scope="col" class="px-6 py-3" >
                        Plazas disponibles
                    </th>
                    <th scope="col" class="px-6 py-3" >
                        Precio
                    </a>
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Acciones
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($vuelos as $vuelo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->codigo }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->origen->nombre }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->destino->nombre }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->compania->nombre }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->salida }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->llegada }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->plazas }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->plazas - $vuelo->reservas->count() }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('vuelos.show', $vuelo) }}">
                                {{$vuelo->precio }}
                            </a>
                        </th>

                        <td class="px-6 py-4">
                            @if ($vuelo->plazas > $vuelo->reservas->count())
                            <a href="{{ route('reservas.create', ['vuelo' => $vuelo]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Reservar
                                </x-primary-button>
                            </a>
                            @else
                                <x-primary-button class="bg-red-500">
                                    Completo
                                </x-primary-button>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
