@extends('layouts.app')

@section('titulo')
    Panel Principal
@endsection

@section('contenido')
    <div class="bg-gradient-to-br from-amber-50 via-green-50 to-emerald-100 p-8 rounded-2xl shadow-2xl border border-emerald-200 relative overflow-hidden">
        <!-- DECORACION DE HOJITA -->
        <div class="absolute top-4 right-4 opacity-10">
            <svg class="w-16 h-16 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/>
            </svg>
        </div>
        <!-- PATRON DE MADERA -->
        <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(90deg, transparent, transparent 2px, #8B4513 2px, #8B4513 4px);"></div>
        <div class="mb-8">
            <h3 class="text-3xl font-bold bg-gradient-to-r from-emerald-700 via-green-600 to-amber-600 bg-clip-text text-transparent mb-4 flex items-center">
               
                Bienvenido al Sistema de Gestión de Planillas - SIGEP
            </h3>
            
            <div class="bg-white/80 backdrop-blur-sm p-4 rounded-xl border border-amber-200 shadow-sm">
                <p class="text-gray-700 text-lg">
                    Hola <span class="font-bold text-emerald-700 text-xl">{{ auth()->user()->employee->first_name }}</span>, 
                    <span class="text-gray-600">gracias por iniciar sesión.</span>
                    <span class="text-sm text-green-600 block mt-1">🌳 FUERTE DESDE LA RAIZ</span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- CARD DE EJMPELOS -->
            <div class="group bg-gradient-to-br from-emerald-50 via-green-50 to-teal-100 p-6 rounded-2xl shadow-lg border border-emerald-200 hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-400/10 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute top-2 right-2 opacity-20 group-hover:opacity-30 transition-opacity duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center mr-3 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-xl text-emerald-700 group-hover:text-emerald-800 transition-colors duration-300">Empleados</h4>
                    </div>
                    <p class="text-sm text-gray-700 mb-4 leading-relaxed">Gestiona todos los empleados registrados.</p>
                    <a href="{{ route('employees.index') }}" class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-emerald-600 hover:to-green-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span>Ver Empleados</span>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- CARD PARA ASISTENCIAS -->
            <div class="group bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 p-6 rounded-2xl shadow-lg border border-amber-200 hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-400/10 to-orange-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute top-2 right-2 opacity-20 group-hover:opacity-30 transition-opacity duration-300">
                    <svg class="w-8 h-8 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,2A2,2 0 0,1 14,4C14,4.74 13.6,5.39 13,5.73V7H14A7,7 0 0,1 21,14A7,7 0 0,1 14,21H10A7,7 0 0,1 3,14A7,7 0 0,1 10,7H11V5.73C10.4,5.39 10,4.74 10,4A2,2 0 0,1 12,2M10,9A5,5 0 0,0 5,14A5,5 0 0,0 10,19H14A5,5 0 0,0 19,14A5,5 0 0,0 14,9H10Z"/>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mr-3 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-xl text-amber-700 group-hover:text-amber-800 transition-colors duration-300">Asistencias</h4>
                    </div>
                    <p class="text-sm text-gray-700 mb-4 leading-relaxed">Registra entrada y salida.</p>
                    <div class="inline-flex items-center bg-gradient-to-r from-amber-500 to-orange-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-amber-600 hover:to-orange-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                        <span>Próximamente</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- CARD DE PANLASS -->
            <div class="group bg-gradient-to-br from-teal-50 via-cyan-50 to-blue-100 p-6 rounded-2xl shadow-lg border border-teal-200 hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-teal-400/10 to-cyan-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute top-2 right-2 opacity-20 group-hover:opacity-30 transition-opacity duration-300">
                    <svg class="w-8 h-8 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6,2C4.89,2 4,2.89 4,4V20A2,2 0 0,0 6,22H10V20.5L12,19L14,20.5V22H18A2,2 0 0,0 20,20V8L14,2H6M13,3.5L18.5,9H13V3.5Z"/>
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center mr-3 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-xl text-teal-700 group-hover:text-teal-800 transition-colors duration-300">Planillas</h4>
                    </div>
                    <p class="text-sm text-gray-700 mb-4 leading-relaxed">Documenta los pagos.</p>
                    <div class="inline-flex items-center bg-gradient-to-r from-teal-500 to-cyan-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-teal-600 hover:to-cyan-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                        <span>Próximamente</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- ELEMETO DECORATIVOS -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-200/30 to-purple-200/30 rounded-full blur-2xl -z-10"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-green-200/30 to-blue-200/30 rounded-full blur-2xl -z-10"></div>
    </div>
@endsection