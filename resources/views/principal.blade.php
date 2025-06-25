@extends('layouts.app')

@section('titulo')
    SIGEP
@endsection

@section('contenido')

    <div class="bg-gradient-to-br from-amber-50 via-green-50 to-emerald-100 p-8 rounded-3xl shadow-2xl border border-emerald-200 relative overflow-hidden mb-8">
        <!-- DECORACIONES -->
        <div class="absolute top-6 right-6 opacity-10">
            <svg class="w-20 h-20 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12,2L13.09,8.26L22,9L13.09,9.74L12,16L10.91,9.74L2,9L10.91,8.26L12,2M12,21.5C13.38,20.14 14.5,18.65 15.41,17.06C16.47,15.26 17,13.38 17,11.5C17,9.62 16.47,7.74 15.41,5.94C14.5,4.35 13.38,2.86 12,1.5C10.62,2.86 9.5,4.35 8.59,5.94C7.53,7.74 7,9.62 7,11.5C7,13.38 7.53,15.26 8.59,17.06C9.5,18.65 10.62,20.14 12,21.5Z"/>
            </svg>
        </div>

        <!-- PATRON DE TEXTURA -->
        <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 8px, #8B4513 8px, #8B4513 12px);"></div>

        <!-- ELEMENTOS DECORATIVOS -->
        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-amber-200/30 to-orange-200/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-green-200/30 to-emerald-200/30 rounded-full blur-3xl"></div>

        <!-- CONTENIDO PRINCIPAL -->
        <div class="relative z-10 text-center">
            <div class="mb-8">
                <!-- LOGO/ICONO PRINCIPAL -->
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-amber-500 via-orange-500 to-red-600 rounded-full shadow-2xl mb-6 relative">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/>
                    </svg>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-full flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2L13.09,8.26L22,9L13.09,9.74L12,16L10.91,9.74L2,9L10.91,8.26L12,2Z"/>
                        </svg>
                    </div>
                </div>

                <!-- TITULO PRINCIPAL -->
                <h1 class="text-5xl font-bold bg-gradient-to-r from-amber-700 via-orange-600 to-red-600 bg-clip-text text-transparent mb-4">
                    FERRETERÍA EL ROBLE
                </h1>

                <h2 class="text-3xl font-semibold text-emerald-700 mb-2">
                    Sistema de Gestión de Planillas
                </h2>

                <div class="inline-block bg-gradient-to-r from-amber-500 to-orange-600 px-6 py-2 rounded-full text-white font-bold text-lg shadow-lg mb-6">
                    SIGEP
                </div>
            </div>


        </div>
    </div>

    <!-- MODULOS PRINCIPALES -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- MPLEADOS -->
        <div class="group bg-gradient-to-br from-emerald-50 via-green-50 to-teal-100 p-6 rounded-2xl shadow-lg border border-emerald-200 hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-400/10 to-green-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

            <div class="relative z-10">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-emerald-700 mb-2">Empleados</h3>
                    <p class="text-sm text-gray-600 mb-4">Gestiona el personal de la ferretería</p>
                    <div class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                        Disponible
                    </div>
                </div>
            </div>
        </div>

        <!-- ASISTENCIAS -->
        <div class="group bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 p-6 rounded-2xl shadow-lg border border-amber-200 hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-amber-400/10 to-orange-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

            <div class="relative z-10">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-amber-700 mb-2">Asistencias</h3>
                    <p class="text-sm text-gray-600 mb-4">Control de entrada y salida</p>
                    <div class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-semibold">
                        Próximamente
                    </div>
                </div>
            </div>
        </div>

        <!-- PLANILLAS -->
        <div class="group bg-gradient-to-br from-teal-50 via-cyan-50 to-blue-100 p-6 rounded-2xl shadow-lg border border-teal-200 hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-teal-400/10 to-cyan-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

            <div class="relative z-10">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-teal-700 mb-2">Planillas</h3>
                    <p class="text-sm text-gray-600 mb-4">Gestión de nómina y pagos</p>
                    <div class="bg-teal-100 text-teal-700 px-3 py-1 rounded-full text-xs font-semibold">
                        Próximamente
                    </div>
                </div>
            </div>
        </div>

        <!-- REPORTES -->
        <div class="group bg-gradient-to-br from-red-50 via-orange-50 to-red-100 p-6 rounded-2xl shadow-lg border border-red-200 hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/15 to-orange-600/15 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="relative z-10">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-orange-600 rounded-xl flex items-center justify-center mb-4 shadow-md group-hover:scale-110 group-hover:shadow-xl group-hover:from-red-700 group-hover:to-orange-700 transition-all duration-300">
                        <svg class="w-8 h-8 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl text-red-700 mb-2 group-hover:text-red-800 transition-colors duration-300">Reportes</h3>
                    <p class="text-sm text-gray-600 mb-4">Análisis y estadísticas</p>
                    <div class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold group-hover:bg-red-200 group-hover:text-red-800 transition-all duration-300">
                        Próximamente
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
