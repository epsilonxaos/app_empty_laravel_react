@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto pt-6 px-1">

        <div class="max-w-7xl mx-auto">
            {{-- @can(PermissionKey::Socios['permissions']['update']['name']) --}}
            <form action="{{ route('panel.website.update', ['seccion' => request('seccion')]) }}"
                enctype="multipart/form-data" class="form-submit-alert-wait" method="POST">
                @csrf
                @method('PUT')
                {{-- @elsecan
                    <form> --}}
                {{-- @endcan --}}

                {{-- @canany([PermissionKey::Socios['permissions']['edit']['name'], PermissionKey::Socios['permissions']['update']['name']]) --}}
                <div class="flex items-center justify-end pb-4 bg-white dark:bg-gray-900">
                    <button type="submit"
                        class="px-2 py-1 bg-orange-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wide transition ease-in-out duration-150 flex items-center">
                        <svg class="w-5 inline-block mr-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                        </svg>
                        Actualizar
                    </button>
                </div>

                <div class="w-full">
                    <div class=" mb-6">
                        <h2 class="mb-2 font-semibold text-gray-900 text-base">Primera Sección</h2>

                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="tab-seccion1"
                                data-tabs-toggle="#tab-content-secc1" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="es-tab-secc1"
                                        data-tabs-target="#es-secc1" type="button" role="tab" aria-controls="es-secc1"
                                        aria-selected="false">Español</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="en-tab-secc1"
                                        data-tabs-target="#en-secc1" type="button" role="tab" aria-controls="en-secc1"
                                        aria-selected="false">Inglés</button>
                                </li>
                            </ul>
                        </div>
                        <div id="tab-content-secc1">
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="es-secc1" role="tabpanel"
                                aria-labelledby="es-tab">
                                <small class="pb-2 block">
                                    Recomendamos siempre que al copiar y pegar información desde algún sitio o
                                    archivo eliminar el formato de los textos para un óptimo funcionamiento, esto se
                                    puede realizar desde el mismo editor de texto presionando el siguiente botón
                                    <img src="{{ asset('img/panel/clear-format.png') }}" class="inline" alt="Clear format">
                                </small>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s1_title1">Título banner 1</label>
                                    <textarea name="home_s1_title1[es]" class="shorttext" cols="30" rows="3">{{ $data->{'home_s1_title1:es'} }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s1_title2">Título banner 2</label>
                                    <textarea name="home_s1_title2[es]" class="shorttext" cols="30" rows="3">{{ $data->{'home_s1_title2:es'} }}</textarea>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="en-secc1" role="tabpanel"
                                aria-labelledby="en-tab">
                                <small class="pb-2 block">
                                    Recomendamos siempre que al copiar y pegar información desde algún sitio o
                                    archivo eliminar el formato de los textos para un óptimo funcionamiento, esto se
                                    puede realizar desde el mismo editor de texto presionando el siguiente botón
                                    <img src="{{ asset('img/panel/clear-format.png') }}" class="inline" alt="Clear format">
                                </small>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s1_title1">Título banner 1</label>
                                    <textarea name="home_s1_title1[en]" class="shorttext" cols="30" rows="10">{{ $data->{'home_s1_title1:en'} }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s1_title2">Título banner 2</label>
                                    <textarea name="home_s1_title2[en]" class="shorttext" cols="30" rows="10">{{ $data->{'home_s1_title2:en'} }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=" mb-6">
                        <h2 class="mb-2 font-semibold text-gray-900 text-base">Segunda Sección</h2>

                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="tab-seccion2"
                                data-tabs-toggle="#tab-content-secc2" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="es-tab-secc2"
                                        data-tabs-target="#es-secc2" type="button" role="tab"
                                        aria-controls="es-secc2" aria-selected="false">Español</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="en-tab-secc2"
                                        data-tabs-target="#en-secc2" type="button" role="tab"
                                        aria-controls="en-secc2" aria-selected="false">Inglés</button>
                                </li>
                            </ul>
                        </div>
                        <div id="tab-content-secc2">
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="es-secc2" role="tabpanel"
                                aria-labelledby="es-tab">
                                <small class="pb-2 block">
                                    Recomendamos siempre que al copiar y pegar información desde algún sitio o
                                    archivo eliminar el formato de los textos para un óptimo funcionamiento, esto se
                                    puede realizar desde el mismo editor de texto presionando el siguiente botón
                                    <img src="{{ asset('img/panel/clear-format.png') }}" class="inline"
                                        alt="Clear format">
                                </small>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s2_text1">Título banner 1</label>
                                    <textarea name="home_s2_text1[es]" class="trumbowyg-panel" cols="30" rows="10">{{ $data->{'home_s2_text1:es'} }}</textarea>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="en-secc2" role="tabpanel"
                                aria-labelledby="en-tab">
                                <small class="pb-2 block">
                                    Recomendamos siempre que al copiar y pegar información desde algún sitio o
                                    archivo eliminar el formato de los textos para un óptimo funcionamiento, esto se
                                    puede realizar desde el mismo editor de texto presionando el siguiente botón
                                    <img src="{{ asset('img/panel/clear-format.png') }}" class="inline"
                                        alt="Clear format">
                                </small>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s2_text1">Título banner 1</label>
                                    <textarea name="home_s2_text1[en]" class="trumbowyg-panel" cols="30" rows="10">{{ $data->{'home_s2_text1:en'} }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=" mb-6">
                        <h2 class="mb-2 font-semibold text-gray-900 text-base">Tercera Sección</h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-3">
                            <div class="col-span-1">
                                <div class="mb-3">
                                    <label for="home_s3_bg1"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portada
                                        Capital</label>
                                    <input type="file" name="home_s3_bg1" class="dropify" data-height="150"
                                        data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png"
                                        data-default-file="{{ asset($data->home_s3_bg1) }}" />
                                    <small>Las medidas recomendadas son 950 x 650 px, solo se aceptan .jpg, .jpeg y .png
                                        con un máximo de peso de 1MB.</small>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mb-3">
                                    <label for="home_s3_bg2"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portada Real
                                        Estate</label>
                                    <input type="file" name="home_s3_bg2" class="dropify" data-height="150"
                                        data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png"
                                        data-default-file="{{ asset($data->home_s3_bg2) }}" />
                                    <small>Las medidas recomendadas son 950 x 650 px, solo se aceptan .jpg, .jpeg y .png
                                        con un máximo de peso de 1MB.</small>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="mb-3">
                                    <label for="home_s3_bg3"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portada
                                        Hospitality</label>
                                    <input type="file" name="home_s3_bg3" class="dropify" data-height="150"
                                        data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png"
                                        data-default-file="{{ asset($data->home_s3_bg3) }}" />
                                    <small>Las medidas recomendadas son 950 x 650 px, solo se aceptan .jpg, .jpeg y .png
                                        con un máximo de peso de 1MB.</small>
                                </div>
                            </div>

                        </div>

                        Is undergoing a process to develop its first investment fund: Black Swan Fund.

                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="tab-seccion3"
                                data-tabs-toggle="#tab-content-secc3" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="es-tab-secc3"
                                        data-tabs-target="#es-secc3" type="button" role="tab"
                                        aria-controls="es-secc3" aria-selected="false">Español</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="en-tab-secc3"
                                        data-tabs-target="#en-secc3" type="button" role="tab"
                                        aria-controls="en-secc3" aria-selected="false">Inglés</button>
                                </li>
                            </ul>
                        </div>
                        <div id="tab-content-secc3">
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="es-secc3" role="tabpanel"
                                aria-labelledby="es-tab">
                                <small class="pb-2 block">
                                    Recomendamos siempre que al copiar y pegar información desde algún sitio o
                                    archivo eliminar el formato de los textos para un óptimo funcionamiento, esto se
                                    puede realizar desde el mismo editor de texto presionando el siguiente botón
                                    <img src="{{ asset('img/panel/clear-format.png') }}" class="inline"
                                        alt="Clear format">
                                </small>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s3_title">Título</label>
                                    <input id="home_s3_title" name="home_s3_title[es]"
                                        value="{{ $data->translate('es')->home_s3_title }}" autocomplete="off"
                                        class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s3_info1">Descripción capital</label>
                                    <textarea name="home_s3_info1[es]" class="shorttext" cols="30" rows="3">{{ $data->{'home_s3_info1:es'} }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s3_info2">Descripción real estate</label>
                                    <textarea name="home_s3_info2[es]" class="shorttext" cols="30" rows="3">{{ $data->{'home_s3_info2:es'} }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s3_info3">Descripción hospitality</label>
                                    <textarea name="home_s3_info3[es]" class="shorttext" cols="30" rows="3">{{ $data->{'home_s3_info3:es'} }}</textarea>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="en-secc3" role="tabpanel"
                                aria-labelledby="en-tab">
                                <small class="pb-2 block">
                                    Recomendamos siempre que al copiar y pegar información desde algún sitio o
                                    archivo eliminar el formato de los textos para un óptimo funcionamiento, esto se
                                    puede realizar desde el mismo editor de texto presionando el siguiente botón
                                    <img src="{{ asset('img/panel/clear-format.png') }}" class="inline"
                                        alt="Clear format">
                                </small>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s3_title">Título</label>
                                    <input id="home_s3_title" name="home_s3_title[en]"
                                        value="{{ $data->translate('en')->home_s3_title }}" autocomplete="off"
                                        class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s3_info1">Descripción capital</label>
                                    <textarea name="home_s3_info1[en]" class="shorttext" cols="30" rows="10">{{ $data->{'home_s3_info1:en'} }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s3_info2">Descripción real estate</label>
                                    <textarea name="home_s3_info2[en]" class="shorttext" cols="30" rows="10">{{ $data->{'home_s3_info2:en'} }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="home_s3_info3">Descripción hospitality</label>
                                    <textarea name="home_s3_info3[en]" class="shorttext" cols="30" rows="10">{{ $data->{'home_s3_info3:en'} }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- @endcanany

                    @can(PermissionKey::Socios['permissions']['update']['name']) --}}
                <div class="text-center pt-6 mt-16">
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
                </div>
                {{-- @endcan --}}
            </form>
        </div>
    </div>
@endsection
