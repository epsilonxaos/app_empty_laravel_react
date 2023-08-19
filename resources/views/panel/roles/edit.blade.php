@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto pt-6 px-1">

        <div class="max-w-7xl mx-auto">
            @can(PermissionKey::Role['permissions']['edit']['name'])
                <form action="{{ route('panel.roles.update', ['id' => $role->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                @elsecan(PermissionKey::Role['permissions']['update']['name'])
                    <form>
                    @endcan
                    <div class="flex items-center justify-end pb-4 bg-white dark:bg-gray-900">
                        @can(PermissionKey::Role['permissions']['update']['name'])
                            <button type="submit"
                                class="px-2 py-1 bg-orange-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wide transition ease-in-out duration-150 flex items-center">
                                <svg class="w-5 inline-block mr-1" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                </svg>
                                Actualizar
                            </button>
                        @endcan
                    </div>

                    <div class="w-full">
                        <div class="">
                            <h2 class="mb-5 font-semibold uppercase text-gray-900 text-base">Creación de rol</h2>
                            <div class="grid grid-cols-1 mb-6">
                                <div class="col-span-1">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                            class="text-red-800">*</span> Nombre del rol</label>
                                    <input id="name" name="name" required autocomplete="off" type="text"
                                        value="{{ old('name') ? old('name') : $role->name }}"
                                        placeholder="Ejemplo: Recepción"
                                        class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>

                            <h3 class="mb-5 font-semibold uppercase text-gray-900">Asignación de permisos</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 mb-6">
                                @if (count(PermissionKey::getConstants()) > 0)
                                    @foreach (PermissionKey::getConstants() as $modulo)
                                        <div class="col-span-1">
                                            <h3 class="mb-3">{{ $modulo['name'] }}</h3>
                                            @if (isset($modulo['permissions']) && count($modulo['permissions']) > 0)
                                                @foreach ($modulo['permissions'] as $permission)
                                                    <div class="block">
                                                        <label
                                                            class="relative inline-flex items-center mb-1 cursor-pointer">
                                                            <input type="checkbox"id="{{ $permission['name'] }}"
                                                                name="permission[{{ $permission['name'] }}]"
                                                                {{ $role->hasPermissionTo($permission['name']) ? 'checked' : '' }}
                                                                value="true" class="sr-only peer">
                                                            <div
                                                                class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                            </div>
                                                            <span
                                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                for="{{ $permission['name'] }}">{{ $permission['display_name'] }}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="text-center pt-6 mt-16">
                        @can(PermissionKey::Role['permissions']['update']['name'])
                            <button type="submit"
                                class="px-2 py-1 mx-auto bg-orange-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wide transition ease-in-out duration-150 flex items-center">
                                <svg class="w-5 inline-block mr-1" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                </svg>
                                Actualizar
                            </button>
                        @endcan
                    </div>
                </form>
        </div>
    </div>
@endsection
