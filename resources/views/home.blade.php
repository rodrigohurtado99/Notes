@extends('layouts.main_layout') {{-- extende o seguinte layout para aplicação --}}
@section('content') {{-- refere o local que o content irá ficar --}}

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">

            @include('top_bar') {{-- inclui o top bar que foi criado numa view separada --}}

            <!-- no notes available -->

            @if(count($notes) == 0) {{-- se não houver notas ele trás essa div abaixo informando que o usuário não possui notas --}}
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="display-6 mb-5 text-secondary opacity-50">You have no notes available!</p>
                    <a href="{{route('new')}}" class="btn btn-secondary btn-lg p-3 px-5">
                        <i class="fa-regular fa-pen-to-square me-3"></i>Create Your First Note
                    </a>
                </div>
            </div>

            @else  {{-- se houver notas ele segue com este fluxo a seguir --}}
            <!-- notes are available -->

            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('new')}}" class="btn btn-secondary px-3">
                    <i class="fa-regular fa-pen-to-square me-2"></i>New Note
                </a>
            </div>
            
            @foreach($notes as $note)
 
            @include('note') {{-- inclui a view notes, que lá possui todas as informações trazidas e layout desta div --}}

            @endforeach

            @endif
        </div>
    </div>
</div>


@endsection