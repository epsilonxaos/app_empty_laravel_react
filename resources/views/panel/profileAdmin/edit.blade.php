@extends('layouts.admin')

@section('content')
    <div class="">
        <div class="sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1 h-full">
                    <div class="p-4 sm:p-8">
                        <div class="max-w-xl">
                            @include('panel.profileAdmin.partials.update-profile-information-form')
                        </div>
                    </div>

                </div>
                <div class="col-span-1 h-full">
                    <div class="p-4 sm:p-8">
                        <div class="max-w-xl">
                            @include('panel.profileAdmin.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>


            <div class="p-4 sm:p-8">
                @can(PermissionKey::Admin['permissions']['destroy']['name'])
                    @include('panel.profileAdmin.partials.delete-user-form')
                @endcan
            </div>
        </div>
    </div>
@endsection
