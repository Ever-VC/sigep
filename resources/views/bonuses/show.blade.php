@extends('layouts.app')

@section('titulo', 'Detalle del Bono')

@section('contenido')
    <h2 class="text-2xl font-bold mb-4">Detalle del Bono</h2>

    <p><strong>Empleado:</strong> {{ $bonus->employee->first_name }} {{ $bonus->employee->last_name }}</p>
    <p><strong>Descripción:</strong> {{ $bonus->description }}</p>
    <p><strong>Monto:</strong> ${{ number_format($bonus->amount, 2) }}</p>
    <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($bonus->date)->format('d/m/Y') }}</p>

    <a href="{{ route('employees.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">Volver a Empleados</a>
@endsection
