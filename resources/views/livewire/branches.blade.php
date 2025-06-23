<div class="max-w-2xl mx-auto">
    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'save' }}" class="mb-6">
        <div class="mb-4">
            <input type="text" wire:model="name" placeholder="Nombre de la sucursal"
                   class="w-full p-2 border rounded">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <input type="text" wire:model="address" placeholder="Dirección"
                   class="w-full p-2 border rounded">
        </div>
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            {{ $isEditing ? 'Actualizar' : 'Guardar' }}
        </button>
    </form>

    <table class="w-full border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Nombre</th>
                <th class="p-2 border">Dirección</th>
                <th class="p-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($branches as $branch)
                <tr>
                    <td class="border p-2">{{ $branch->name }}</td>
                    <td class="border p-2">{{ $branch->address }}</td>
                    <td class="border p-2 space-x-2">
                        <button wire:click="edit({{ $branch->id }})"
                                class="bg-yellow-400 px-2 py-1 rounded text-white">Editar</button>
                        <button wire:click="delete({{ $branch->id }})"
                                class="bg-red-500 px-2 py-1 rounded text-white"
                                onclick="return confirm('¿Estás seguro de eliminar esta sucursal?')">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>