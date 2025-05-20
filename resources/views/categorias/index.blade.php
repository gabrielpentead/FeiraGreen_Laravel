@extends('layouts.app')

@section('content')
<div class="categoria-container">
    <h1>{{ ucfirst($categoria) }}</h1>

    @if($produtos->isEmpty())
        <p>Nenhum produto encontrado nesta categoria.</p>
    @else
        <div class="produtos-grid">
            @foreach($produtos as $produto)
                <div class="produto-card">
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}">
                    <h3>{{ $produto->nome }}</h3>
                    <p>{{ $produto->descricao }}</p>
                    <p><strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</strong></p>
                    <a href="{{ route('produto.show', $produto->id) }}">Ver mais</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
