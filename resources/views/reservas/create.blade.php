<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('reservas.store', ['vuelo' => $vuelo]) }}">
            @csrf
            <!-- Vuelo -->
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                Vuelo: {{ $vuelo->codigo }}
            </h1>

            <!-- Asiento -->
            <div>
                <x-input-label for="asiento" :value="'Selecciona asiento'" />
                <select id="asiento" class="block mt-1 w-full" name="asiento" required>
                    @foreach ($libres as $asiento)
                        <option value="{{ $asiento }}" {{ old('asiento') == $asiento ? 'selected' : '' }}>
                            {{ "Asiento número ". $asiento }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('asiento')" class="mt-2" />

            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('reservas.selecciona-vuelo') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Reservar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
