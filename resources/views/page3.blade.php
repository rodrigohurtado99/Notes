@extends('layouts.main_layout') {{-- extende o layout, de main_layout --}}

{{-- abaixo cria nosso conteudo da página, lembrando que os padrões html foram extendidos de main layout --}}

@section('content')        
    <h1>Welcome View and Blade!</h1>
    <hr>
    <h3>The value is {{$value}}</h3>
@endsection 
