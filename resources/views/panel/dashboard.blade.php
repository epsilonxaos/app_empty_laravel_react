@extends('layouts.admin')

@section('content')
    <div class="h-[70vh] flex items-center justify-center gap-4">
        <main class="text-center">
            <img class="max-w-xs invert mx-auto" src="{{ asset('img/logo.png') }}" alt="Logo">
            <h2 class="text-xl md:text-3xl font-bold">Bienvenido al panel administrativo</h2>
        </main>
    </div>
@endsection
