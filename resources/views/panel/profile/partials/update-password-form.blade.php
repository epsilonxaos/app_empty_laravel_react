<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}
        </p>
    </header>

	@can(PermissionKey::Admin['permissions']['index']['name'])
		@if ($profile)
			<form method="post" action="{{ route('panel.profile.update.password') }}" class="mt-6 space-y-6">
		@else
			<form method="post" action="{{ route('panel.usuarios.update.password', ['id' => $user->id]) }}" class="mt-6 space-y-6">
		@endif
			@csrf
			@method('put')
	@elsecan
		<form>
	@endcan


        <div>
            <x-input-label for="current_password" :value="__('Contraseña actual')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Nueva contraseña')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
			@can(PermissionKey::Admin['permissions']['update']['name'])
            	<x-primary-button>{{ __('Guardar') }}</x-primary-button>
			@endcan

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Cambios guardados!') }}</p>
            @endif
        </div>
    </form>
</section>
