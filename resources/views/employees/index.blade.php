@extends('layouts.app')

@section('titulo', 'Listado de Empleados')
@section('contenido')
    <div class="">
        <h3 class="text-xl font-bold">Listado de empleados</h3>
        <a href="{{ route('employees.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Agregar nuevo empleado
        </a></div><br>
    @livewire('employees.employee-list')
@endsection
