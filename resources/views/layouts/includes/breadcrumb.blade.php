<div class="p-4 border-2 border-white bg-white shadow rounded-lg dark:border-gray-700 mt-14">

    <div class="grid py-2 grid-cols-1 sm:grid-cols-2">
        <div class="col-span-1 max-sm:text-center max-sm:mb-4">
            @if (isset($title))
                <h6 class="text-slate-800 inline-block mb-0 text-lg font-medium">{{ $title }}</h6>
            @endif
        </div>
        <div class="col-span-1">
            @if (isset($breadcrumb) && count($breadcrumb) > 0)

                <nav class="flex justify-end" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 text-sm">
                        @foreach ($breadcrumb as $key => $b)
                            @if (isset($b['disabled']))
                                @if (!$b['disabled'])
                                    <li
                                        class="inline-flex items-center {{ isset($b['active']) && $b['active'] ? 'active' : '' }}">
                                        <div class="flex items-center">
                                            @if ($key === 0)
                                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                                    </path>
                                                </svg>
                                            @else
                                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            @endif
                                            @if (isset($b['params']))
                                                <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
                                                    href="{{ isset($b['route']) ? route($b['route'], $b['params']) : '' }}">{{ $b['title'] }}</a>
                                            @else
                                                <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
                                                    href="{{ isset($b['route']) ? route($b['route']) : '' }}">{{ $b['title'] }}</a>
                                            @endif
                                        </div>
                                    </li>
                                @endif
                            @else
                                <li
                                    class="inline-flex items-center {{ isset($b['active']) && $b['active'] ? 'active' : '' }}">
                                    <div class="flex items-center">
                                        @if ($key === 0)
                                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                                </path>
                                            </svg>
                                        @else
                                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                        @if (isset($b['params']))
                                            @if (isset($b['route']))
                                                <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
                                                    href="{{ isset($b['route']) ? route($b['route'], $b['params']) : '' }}">{{ $b['title'] }}</a>
                                            @else
                                                {{ $b['title'] }}
                                            @endif
                                        @else
                                            @if (isset($b['route']))
                                                <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
                                                    href="{{ isset($b['route']) ? route($b['route']) : '' }}">{{ $b['title'] }}</a>
                                            @else
                                                {{ $b['title'] }}
                                            @endif
                                        @endif
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </nav>

            @endif
        </div>
    </div>

    @if (Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @error('invalid')
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            {{ $message }}
        </div>
    @enderror

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
