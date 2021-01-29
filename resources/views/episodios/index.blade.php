@extends('layout')

@section('cabecalho')
    Episodios
@endsection

@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])

    <form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="post" class="mb-4">
        @csrf
        <ul class="list-group">
            @foreach($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                 Episodio {{ $episodio->numero }}

                <input type="checkbox"
                       name="episodios[]"
                       value="{{$episodio->id}}"
                    {{ $episodio->episodio_assistido ? 'checked' : '' }}>
            </li>
            @endforeach
            @guest
                <span style="height: 60px"></span>
            @endguest
        </ul>
        @auth
        <button class="btn btn-primary mt-2">Salvar</button>

        @endauth
    </form>

@endsection
