<div class="p-6 bg-white rounded shadow-md">
    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">DUI</th>
                <th class="px-4 py-2 text-left">Teléfono</th>
                <th class="px-4 py-2 text-left">Dirección</th>
                <th class="px-4 py-2 text-left">Fecha de Nacimiento</th>
                <th class="px-4 py-2 text-left">Sucursal</th>
                <th class="px-4 py-2 text-left">Tipo Contrato</th>
                <th class="px-4 py-2 text-left">Turno</th>
                <th class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td class="px-4 py-2">{{ $employee->dui }}</td>
                    <td class="px-4 py-2">{{ $employee->phone }}</td>
                    <td class="px-4 py-2">{{ $employee->address }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($employee->birth_date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2">{{ $employee->branch?->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $employee->contractType?->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $employee->shift?->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 space-x-2 flex items-center">
                        {{-- Botón Editar --}}
                    <a href="{{ route('employees.edit-live', $employee->id) }}" class="text-blue-600 hover:underline">
                        Editar
                    </a>
                        {{-- Botón Eliminar --}}
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este empleado?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 flex items-center gap-1" title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Eliminar
                            </button>
                        </form>

                        {{-- Botón Bono o Ver Bono --}}
                        @if ($employee->bonuses->isNotEmpty())
                            <a href="{{ route('bonuses.show', ['bonus' => $employee->bonuses->first()->id]) }}"
                            class="text-green-600 hover:text-green-800 flex items-center gap-1" title="Ver Bono">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Ver Bono
                            </a>
                        @else
                            <a href="{{ route('bonuses.create', ['employee' => $employee->id]) }}"
                            class="text-green-600 hover:text-green-800 flex items-center gap-1" title="Asignar Bono">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Bono
                            </a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center py-4 text-gray-500">No hay empleados registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</div>
