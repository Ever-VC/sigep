@extends('layouts.app')

@section('titulo', 'Listado de Empleados')

@section('contenido')
    <h2 class="text-2xl font-bold mb-4">Empleados</h2>

    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">DUI</th>
                <th class="px-4 py-2 text-left">Teléfono</th>
                <th class="px-4 py-2 text-left">Dirección</th>
                <th class="px-4 py-2 text-left">Fecha de Nacimiento</th>
                <th class="px-4 py-2 text-left">Género</th>
                <th class="px-4 py-2 text-left">Sucursal</th>
                <th class="px-4 py-2 text-left">Tipo Contrato</th>
                <th class="px-4 py-2 text-left">Turno</th>
                <th class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td class="px-4 py-2">{{ $employee->dui }}</td>
                    <td class="px-4 py-2">{{ $employee->phone }}</td>
                    <td class="px-4 py-2">{{ $employee->address }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($employee->birth_date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2">{{ ucfirst($employee->gender) }}</td>
                    <td class="px-4 py-2">{{ $employee->branch ? $employee->branch->name : 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $employee->contractType ? $employee->contractType->name : 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $employee->shift ? $employee->shift->name : 'N/A' }}</td>
                    <td class="px-4 py-2">
                        @if ($employee->bonuses->isNotEmpty())
                            <a href="{{ route('bonuses.show', ['bonus' => $employee->bonuses->first()->id]) }}"
                            class="text-green-600 font-semibold hover:underline">
                                Bono asignado - Ver detalles
                            </a>
                        @else
                            <a href="{{ route('bonuses.create', ['employee' => $employee->id]) }}" class="text-blue-500 hover:underline">
                                Asignar Bono
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
