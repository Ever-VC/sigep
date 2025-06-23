@extends('layouts.app')

@section('titulo', 'Asignar Bono')

@section('contenido')
    <h2 class="text-2xl font-bold mb-4">Asignar Bono a {{ $employee->first_name }} {{ $employee->last_name }}</h2>

    <form action="{{ route('bonuses.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-md">
        @csrf
        <input type="hidden" name="employee_id" value="{{ $employee->id }}">

        <label class="block mb-2 font-bold" for="description">Descripción</label>
        <input type="text" id="description" name="description" class="w-full border px-3 py-2 rounded mb-4" required>

        <label class="block mb-2 font-bold" for="amount">Monto</label>
        <input type="number" id="amount" name="amount" step="0.01" class="w-full border px-3 py-2 rounded mb-4" required>

        <label class="block mb-2 font-bold" for="date">Fecha</label>
        <input type="date" id="date" name="date" class="w-full border px-3 py-2 rounded mb-4" required>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar Bono</button>
    </form>
@endsection
