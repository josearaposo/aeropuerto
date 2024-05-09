<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('vuelos.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Codigo -->
            <div>
                <x-input-label for="codigo" :value="'Codigo del Vuelo'" />
                <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')"
                    required autofocus autocomplete="codigo" />
                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
            </div>

            <!-- A.Origen -->
            <div>
                <x-input-label for="origen_id" :value="'Aeropuerto Origen'" />
                <select id="origen_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="origen_id" required>
                    @forelse ($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}"
                            {{ old('aeropuerto_id') == $aeropuerto->id ? 'selected' : '' }}>
                            {{ $aeropuerto->nombre }}
                        </option>

                    @empty
                        No existen aeropuertos
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('origen_id')" class="mt-2" />

            </div>
            <!-- A.Destino -->
            <div>
                <x-input-label for="destino_id" :value="'Aeropuerto destino'" />
                <select id="destino_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="destino_id" required>
                    @forelse ($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}"
                            {{ old('aeropuerto_id') == $aeropuerto->id ? 'selected' : '' }}>
                            {{ $aeropuerto->nombre }}
                        </option>

                    @empty
                        No existen aeropuertos
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('destino_id')" class="mt-2" />

            </div>
            <!-- Compañia -->
            <div>
                <x-input-label for="compania_id" :value="'Compania'" />
                <select id="compania_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="compania_id" required>
                    @forelse ($companias as $compania)
                        <option value="{{ $compania->id }}" {{ old('compania_id') == $compania->id ? 'selected' : '' }}>
                            {{ $compania->nombre }}
                        </option>

                    @empty
                        No existen companias
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('compania_id')" class="mt-2" />
            </div>
            <!-- Horas -->
            <div>
                <x-input-label for="salida" :value="'Fecha de Salida'" />

                <input for="salida" type="datetime-local" id="salida" name="salida">
                <x-input-error :messages="$errors->get('salida')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="llegada" :value="'Fecha de Llegada'" />

                <input for="llegada" type="datetime-local" id="llegada" name="llegada">
                <x-input-error :messages="$errors->get('llegada')" class="mt-2" />
            </div>
            <!-- Plazas -->
            <div>
                <x-input-label for="plazas" :value="'Plazas del Vuelo'" />
                <x-text-input id="plazas" class="block mt-1 w-full" type="text" name="plazas" :value="old('plazas')"
                    required autofocus autocomplete="plazas" />
                <x-input-error :messages="$errors->get('plazas')" class="mt-2" />
            </div>
            <!-- Precio -->
            <div>
                <x-input-label for="precio" :value="'Precio del Vuelo'" />
                <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio')"
                    required autofocus autocomplete="precio" />
                <x-input-error :messages="$errors->get('precio')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('vuelos.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
