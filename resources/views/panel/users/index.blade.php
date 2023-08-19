@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto">
        <div class="flex items-center justify-end pb-4 bg-white dark:bg-gray-900">
            @can(PermissionKey::Admin['permissions']['create']['name'])
                <a href="{{ route('panel.usuarios.create') }}"
                    class="px-2 py-1 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wide transition ease-in-out duration-150 flex items-center">
                    <svg class="w-5 inline-block mr-1" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 6v12m6-6H6" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Nuevo usuario
                </a>
            @endcan
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-emerald-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="text-base font-semibold">{{ $item->name }}</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="font-normal text-gray-500">{{ $item->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-center w-32">
                            @can([PermissionKey::Admin['permissions']['edit']['name'],
                                PermissionKey::Admin['permissions']['update']['name']])
                                <a href="{{ route('panel.usuarios.edit', ['id' => $item->id]) }}"
                                    class="font-medium text-emerald-600 dark:text-emerald-500 inline-block " title='Editar'>
                                    <svg width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                </a>
                            @elsecan(PermissionKey::Admin['permissions']['edit']['name'])
                                <a href="{{ route('panel.usuarios.edit', ['id' => $item->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 inline-block" title='Ver detalle'>
                                    <svg width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                                        <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                                        <path d="M3 6l0 13"></path>
                                        <path d="M12 6l0 13"></path>
                                        <path d="M21 6l0 13"></path>
                                    </svg>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
