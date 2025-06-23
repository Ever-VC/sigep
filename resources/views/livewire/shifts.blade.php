<div class="max-w-4xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Gestión de Turnos</h2>

    @if (session()->has('mensaje'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('mensaje') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}" class="mb-6 bg-white p-4 rounded shadow">
        <div class="mb-4">
            <label class="block font-bold mb-1">Descripción</label>
            <input type="text" wire:model="description" class="w-full border rounded p-2">
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Hora de entrada</label>
            <input type="time" wire:model="entry_time" class="w-full border rounded p-2">
            @error('entry_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Hora de salida</label>
            <input type="time" wire:model="exit_time" class="w-full border rounded p-2">
            @error('exit_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ $modoEdicion ? 'Actualizar' : 'Guardar' }}
            </button>
            @if ($modoEdicion)
                <button type="button" wire:click="cancelar" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </button>
            @endif
        </div>
    </form>

    <table class="w-full bg-white rounded shadow text-left">
        <thead>
            <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                <th class="p-3">Descripción</th>
                <th class="p-3">Entrada</th>
                <th class="p-3">Salida</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $s)
                <tr class="border-t">
                    <td class="p-3">{{ $s->description }}</td>
                    <td class="p-3">{{ \Carbon\Carbon::parse($s->entry_time)->format('H:i') }}</td>
                    <td class="p-3">{{ \Carbon\Carbon::parse($s->exit_time)->format('H:i') }}</td>
                    <td class="p-3 flex gap-2">
                        <button wire:click="editar({{ $s->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded text-sm">Editar</button>
                        <button wire:click="eliminar({{ $s->id }})" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
