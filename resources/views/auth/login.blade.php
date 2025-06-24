@extends('layouts.app')

@section('titulo')
    Inicia Sesión en SIGEP
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            Imagen
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                @error('mensaje')
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">
                        {{ $message }}
                    </p>
                @enderror
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu nombre correo..."
                        class="border p-3 w-full rounded-lg  bg-white @error('email') border-red-500  @enderror"
                        value="{{ old('email') }}"
                        required
                    />
                    @error('email')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password del registro..."
                        class="border p-3 w-full rounded-lg  bg-white @error('password') border-red-500  @enderror"
                    />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label class="text-gray-500 text-sm" for="remember"> Recordar mis credenciales</label>
                </div>
                <div class="mb-5 text-right">
                    <a href="{{ route('password.request') }}" class="text-sm text-sky-600 hover:underline">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
                <input
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>

@endsection