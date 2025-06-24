<div class="p-6 bg-white rounded shadow-md">
    @if (session()->has('message'))
        <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label class="block text-sm">Nombre</label>
            <input type="text" wire:model="first_name" class="w-full p-2 border rounded">
            @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Guardar Cambios
        </button>
    </form>

    <a href="{{ route('employees.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">
        Volver al listado
    </a>
</div>
