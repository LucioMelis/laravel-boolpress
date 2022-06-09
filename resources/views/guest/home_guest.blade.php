@extends('layouts.front-app')


@section('vue')
    <h1>Benvenuto su Boolpress</h1>

    <p>ACCEDI: <a href="{{ route('login') }}">Login</a></p>
    <p>NUOVO UTENTE: <a href="{{ route('register') }}">Registrati</a></p>
@endsection
