<div class="p-6 bg-white rounded shadow-md">
    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <h3 class="text-xl font-bold mb-4">
        {{ $editing ? 'Editar Empleado' : 'Nuevo Empleado' }}
    </h3>

    <form wire:submit.prevent="{{ $editing ? 'update' : 'store' }}" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Nombre</label>
            <input type="text" wire:model.defer="first_name" class="w-full p-2 border rounded">
            @error('first_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Apellido</label>
            <input type="text" wire:model.defer="last_name" class="w-full p-2 border rounded">
            @error('last_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">DUI</label>
            <input type="text" wire:model.defer="dui" class="w-full p-2 border rounded">
            @error('dui') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Teléfono</label>
            <input type="text" wire:model.defer="phone" class="w-full p-2 border rounded">
            @error('phone') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Dirección</label>
            <input type="text" wire:model.defer="address" class="w-full p-2 border rounded">
            @error('address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Fecha de nacimiento</label>
            <input type="date" wire:model.defer="birth_date" class="w-full p-2 border rounded">
            @error('birth_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Género</label>
            <select wire:model.defer="gender" class="w-full p-2 border rounded">
                <option value="">Seleccionar</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
            @error('gender') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Sucursal</label>
            <select wire:model.defer="branch_id" class="w-full p-2 border rounded">
                <option value="">Seleccionar</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
            @error('branch_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Tipo de contrato</label>
            <select wire:model.defer="contract_type_id" class="w-full p-2 border rounded">
                <option value="">Seleccionar</option>
                @foreach ($contractTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->description }}</option>
                @endforeach
            </select>
            @error('contract_type_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-600 font-semibold">Turno</label>
            <select wire:model.defer="shift_id" class="w-full p-2 border rounded">
                <option value="">Seleccionar</option>
                @foreach ($shifts as $shift)
                    <option value="{{ $shift->id }}">{{ $shift->description }}</option>
                @endforeach
            </select>
            @error('shift_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2 flex gap-3 justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                {{ $editing ? 'Actualizar' : 'Guardar' }}
            </button>

            @if ($editing)
                <button type="button" wire:click="cancel" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                    Cancelar
                </button>
            @endif
        </div>
    </form>
</div>
