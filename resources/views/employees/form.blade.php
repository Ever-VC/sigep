<div class="mt-6 bg-gray-100 p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        {{ $editing ? 'Editar Empleado' : 'Nuevo Empleado' }}
    </h3>

    <form wire:submit.prevent="{{ $editing ? 'update' : 'store' }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- Nombres --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombres</label>
            <input type="text" wire:model="first_name" class="w-full p-2 border rounded-md">
            @error('first_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Apellidos --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input type="text" wire:model="last_name" class="w-full p-2 border rounded-md">
            @error('last_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- DUI --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">DUI</label>
            <input type="text" wire:model="dui" class="w-full p-2 border rounded-md">
            @error('dui') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Teléfono --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input type="text" wire:model="phone" class="w-full p-2 border rounded-md">
            @error('phone') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Dirección --}}
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Dirección</label>
            <input type="text" wire:model="address" class="w-full p-2 border rounded-md">
            @error('address') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Fecha de nacimiento --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
            <input type="date" wire:model="birth_date" class="w-full p-2 border rounded-md">
            @error('birth_date') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Género --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Género</label>
            <select wire:model="gender" class="w-full p-2 border rounded-md">
                <option value="">-- Seleccione --</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
            @error('gender') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Sucursal --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Sucursal</label>
            <select wire:model="branch_id" class="w-full p-2 border rounded-md">
                <option value="">-- Seleccione --</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
            @error('branch_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Tipo de Contrato --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Tipo de contrato</label>
            <select wire:model="contract_type_id" class="w-full p-2 border rounded-md">
                <option value="">-- Seleccione --</option>
                @foreach($contractTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->description }}</option>
                @endforeach
            </select>
            @error('contract_type_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Turno --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Turno</label>
            <select wire:model="shift_id" class="w-full p-2 border rounded-md">
                <option value="">-- Seleccione --</option>
                @foreach($shifts as $shift)
                    <option value="{{ $shift->id }}">{{ $shift->description }}</option>
                @endforeach
            </select>
            @error('shift_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Botones --}}
        <div class="md:col-span-2 flex justify-end gap-4 mt-4">
            <button wire:click="cancel" type="button" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancelar</button>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                {{ $editing ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>
</div>
