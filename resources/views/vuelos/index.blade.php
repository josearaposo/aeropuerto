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
                    <a href="{{ route('vuelos.index', ['order' => 'salida', 'order_dir' => order_dir($order == 'salida', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Salida {{ order_dir_arrow($order == 'salida', $order_dir) }}
                    </a>
                </th>
                    <th scope="col" class="px-6 py-3" >
                        Llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'plazas', 'order_dir' => order_dir($order == 'plazas', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Plazas {{ order_dir_arrow($order == 'plazas', $order_dir) }}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3" >
                        Plazas disponibles
                    </th>
                    <th scope="col" class="px-6 py-3" >
                    <a href="{{ route('vuelos.index', ['order' => 'precio', 'order_dir' => order_dir($order == 'precio', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Precio {{ order_dir_arrow($order == 'precio', $order_dir) }}
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
                        <td class="px-6 py-4">
                            <form action="{{ route('vuelos.destroy', ['vuelo' => $vuelo]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Anular
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('vuelos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500 mb-2">Insertar un nuevo vuelo</x-primary-button>
        </form>
    </div>
</x-app-layout>
