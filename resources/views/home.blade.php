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

            <div class="row">
                <div class="col">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-info">Note Title</h4>
                                <small class="text-secondary"><span class="opacity-75 me-2">Created at:</span><strong>00/00/0000 00:00:00</strong></small>
                            </div>
                            <div class="col text-end">
                                <a href="#" class="btn btn-outline-secondary btn-sm mx-1"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-outline-danger btn-sm mx-1"><i class="fa-regular fa-trash-can"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia temporibus necessitatibus nesciunt quam repellat porro commodi autem veniam doloribus nostrum magni rerum, libero ullam maxime praesentium cum velit. Recusandae, aspernatur.</p>
                    </div>
                </div>
            </div>

            @endif
        </div>
    </div>
</div>


@endsection