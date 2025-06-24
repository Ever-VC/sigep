@extends('layouts.app')

@section('titulo', 'Editar Bono')

@section('contenido')
    <h2 class="text-2xl font-bold mb-4">Editar Bono</h2>

    {{-- Formulario de edición --}}
    <form action="{{ route('bonuses.update', $bonus->id) }}" method="POST" class="mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Descripción</label>
            <input type="text" name="description" value="{{ old('description', $bonus->description) }}"
                   class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Monto</label>
            <input type="number" name="amount" step="0.01" value="{{ old('amount', $bonus->amount) }}"
                   class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Fecha</label>
            <input type="date" name="date" value="{{ old('date', \Carbon\Carbon::parse($bonus->date)->format('Y-m-d')) }}"
                   class="w-full p-2 border rounded">
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Guardar Cambios
        </button>
    </form>

    {{-- Botón separado para eliminar --}}
    <form action="{{ route('bonuses.destroy', $bonus->id) }}" method="POST"
          onsubmit="return confirm('¿Seguro que deseas eliminar este bono?');" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Eliminar Bono
        </button>
    </form>

    <div class="mt-4">
        <a href="{{ route('employees.index') }}" class="text-blue-500 hover:underline">
            Volver al listado
        </a>
    </div>
@endsection
