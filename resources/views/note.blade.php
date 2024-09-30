{{-- VIEW QUE É RESPONSÁVEL PELO LAYOUT DAS NOSSAS NOTAS E AS INFORMAÇÕES PUXADAS DO BANCO DE DADOS --}}

<div class="row">
    <div class="col">
        <div class="card p-4">
            <div class="row">
                <div class="col">
                    <h4 class="text-info">{{$note['title']}}</h4> {{-- titulo da nota --}}
                    <small class="text-secondary"><span class="opacity-75 me-2">Created at:</span><strong>{{date('Y-m-d H:i:s', strtotime($note['created_at']))}}</strong></small>
                </div>
                <div class="col text-end"> {{-- o objeto crypt irá fazer a criptografia do nosso id, sendo pra ele não ficar visivel na url --}}
                    <a href="{{ route('edit', ['id' => Crypt::encrypt($note['id'])]) }}" class="btn btn-outline-secondary btn-sm mx-1"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="{{route('delete', ['id' => Crypt::encrypt($note['id'])])}}" class="btn btn-outline-danger btn-sm mx-1"><i class="fa-regular fa-trash-can"></i></a>
                </div>
            </div>
            <hr>
            <p class="text-secondary">{{$note['text']}}</p>
        </div>
    </div>
</div>