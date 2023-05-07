@extends('layouts.admin')

@section('content')
    Estamos en el panel de admin

    <form action="{{route('panel.logout')}}" method="post">
        @csrf
        <button type="submit" >Cerrar Sesion</button>
    </form>
@endsection