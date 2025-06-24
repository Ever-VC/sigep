<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>El Roble - @yield('titulo')</title>
        <script src="{{ asset('js/app.js') }}" defer module></script>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
        <header class="p-5 bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/" class="text-3xl font-black text-green-700">Ferretería El Roble</a>

                @auth
                    <nav class="flex items-center gap-4">
                        <span class="text-sm text-gray-600">Hola, <strong>{{ auth()->user()->email }}</strong></span>

                        @role('admin')
                            <details class="relative">
                                <summary class="cursor-pointer text-sm font-semibold text-gray-700 hover:underline">
                                    Administración
                                </summary>
                                <div class="absolute right-0 mt-2 w-56 bg-white border rounded shadow-md z-10">
                                    <a href="{{ route('branches.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Gestión de Sucursales
                                    </a>
                                    <a href="{{ route('contract-types.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Tipos de Contrato
                                    </a>
                                    <a href="{{ route('shifts.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Turnos
                                    </a>
                                    <a href="{{ route('employees.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Empleados
                                    </a>
                                </div>
                            </details>
                        @endrole

                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="text-sm text-gray-600 hover:underline font-semibold">
                                Cerrar sesión
                            </button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                    </nav>
                @endguest
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>
        <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
            Ferretería El Roble - Todos los derechos reservados {{ now()->year }}
        </footer>
    </body>
</html>