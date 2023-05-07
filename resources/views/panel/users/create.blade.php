@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto">
        <form action="{{route('panel.usuarios.store')}}" method="POST">
            @csrf

            <div class="flex items-center justify-end pb-4 bg-white dark:bg-gray-900">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg px-3 py-2 text-xs font-medium dark:bg-blue-600 dark:hover:bg-blue-700 flex items-center">
                    <svg class="w-5 inline-block mr-1" aria-hidden="true" fill="none" stroke="currentColor"
                        stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 6v12m6-6H6" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Guardar
                </button>
            </div>


            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="name" name="name" required autofocus autocomplete="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                    electrónico</label>
                <input type="email" id="email" name="email" required autocomplete="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="correo@prueba.com">
            </div>
            <div class="mb-6">
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                <input type="password" id="password" name="password" required autocomplete="new-password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="password_confirmation"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmación de contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    autocomplete="new-password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="text-center pt-8 mt-16">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg px-3 py-2 text-xs font-medium dark:bg-blue-600 dark:hover:bg-blue-700 flex items-center mx-auto">
                    <svg class="w-5 inline-block mr-1" aria-hidden="true" fill="none" stroke="currentColor"
                        stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 6v12m6-6H6" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Guardar
                </button>
            </div>
        </form>


    </div>
@endsection
