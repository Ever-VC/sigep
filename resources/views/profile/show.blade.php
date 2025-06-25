@extends('layouts.app')

@section('titulo', 'Mi Perfil')

@section('contenido')
    <div class="bg-white p-8 rounded-xl shadow-md max-w-4xl mx-auto">
        <h3 class="text-2xl font-bold mb-6 text-gray-800">👤 Información del Empleado</h3>
        
        <div class="grid md:grid-cols-2 gap-y-4 gap-x-8 text-gray-700">
            <div>
                <p class="font-semibold">Nombre:</p>
                <p>{{ $employee->first_name }} {{ $employee->last_name }}</p>
            </div>
            <div>
                <p class="font-semibold">DUI:</p>
                <p>{{ $employee->dui }}</p>
            </div>
            <div>
                <p class="font-semibold">Dirección:</p>
                <p>{{ $employee->address }}</p>
            </div>
            <div>
                <p class="font-semibold">Teléfono:</p>
                <p>{{ $employee->phone }}</p>
            </div>
            <div>
                <p class="font-semibold">Fecha de Nacimiento:</p>
                <p>{{ $employee->birth_date }}</p>
            </div>
            <div>
                <p class="font-semibold">Género:</p>
                <p>{{ $employee->gender }}</p>
            </div>
            <div>
                <p class="font-semibold">Sucursal:</p>
                <p>{{ $employee->branch->name ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="font-semibold">Contrato:</p>
                <p>{{ $employee->contractType->name ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="font-semibold">Turno:</p>
                <p>{{ $employee->shift->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>
@endsection
