@extends('layouts.app')

@section('titulo')
    Panel Principal
@endsection

@section('contenido')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-4">Bienvenido al Sistema de Gestión de Planillas - SIGEP</h3>

        <p class="text-gray-700 mb-6">
            Hola <span class="font-bold">{{  auth()->user()->employee->first_name }}</span>, gracias por iniciar sesión.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-100 p-4 rounded shadow">
                <h4 class="font-bold text-blue-700">Empleados</h4>
                <p class="text-sm text-gray-600">Gestiona todos los empleados registrados.</p>
            </div>

            <div class="bg-green-100 p-4 rounded shadow">
                <h4 class="font-bold text-green-700">Asistencias</h4>
                <p class="text-sm text-gray-600">Consulta y registra entradas y salidas.</p>
            </div>

            <div class="bg-yellow-100 p-4 rounded shadow">
                <h4 class="font-bold text-yellow-700">Planillas</h4>
                <p class="text-sm text-gray-600">Genera y descarga planillas de pago.</p>
            </div>
        </div>
    </div>
@endsection
