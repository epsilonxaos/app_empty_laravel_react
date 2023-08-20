<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información de Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Actualice la información de perfil y la dirección de correo electrónico de su cuenta.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    @can(PermissionKey::Admin['permissions']['update']['name'])

        @if ($profile)
            <form method="post" action="{{ route('panel.profile.update') }}" class="mt-6 space-y-6">
            @else
                <form method="post" action="{{ route('panel.usuarios.update', ['id' => $user->id]) }}"
                    class="mt-6 space-y-6">
        @endif

        @csrf
        @method('patch')
        @elsecan
        <form action="">
        @endcan

        <div class="mb-6">

            @if (request()->is('admin/usuarios/*'))
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                        class="text-danger">*</span> Asignación de
                    rol</label>
                <select name="role" id="role" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if (isset($roles) && count($roles) > 0)
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->hasRole($role->id) ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    @else
                        <option value="">sin contenido...</option>
                    @endif
                </select>
            @endif

        </div>
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Su dirección de correo electrónico no está verificada.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Haga clic aquí para volver a enviar el correo electrónico de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            @can(PermissionKey::Admin['permissions']['update']['name'])
                <x-primary-button>{{ __('Guardar') }}</x-primary-button>
            @endcan

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Cambios guardados!') }}</p>
            @endif
        </div>
    </form>
</section>
