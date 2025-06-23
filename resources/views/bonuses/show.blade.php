@extends('layouts.app')

@section('titulo', 'Detalle del Bono')

@section('contenido')
    <h2 class="text-2xl font-bold mb-4">Detalle del Bono</h2>

    <div class="bg-white shadow-md rounded p-4">
        <p><strong>Empleado:</strong> {{ $bonus->employee->first_name }} {{ $bonus->employee->last_name }}</p>
        <p><strong>Descripción:</strong> {{ $bonus->description }}</p>
        <p><strong>Monto:</strong> ${{ number_format($bonus->amount, 2) }}</p>
        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($bonus->date)->format('d/m/Y') }}</p>

        <div class="flex items-center gap-4 mt-6">
            {{-- Botón Editar --}}
            <a href="{{ route('bonuses.edit', $bonus->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded">
                Editar
            </a>

            {{-- Botón Eliminar --}}
            <form action="{{ route('bonuses.destroy', $bonus->id) }}" method="POST"
                  onsubmit="return confirm('¿Seguro que quieres eliminar este bono?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded">
                    Eliminar
                </button>
            </form>

            {{-- Volver --}}
            <a href="{{ route('employees.index') }}"
               class="text-blue-600 hover:underline ml-auto">
                Volver a Empleados
            </a>
        </div>
    </div>
@endsection
