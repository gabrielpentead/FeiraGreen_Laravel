@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('css/search_results.css') }}">
@endsection

@section('content')
<div class="search-container">
    <div class="search-header">
        <h1>Resultados da Busca: <span class="search-term">"{{ $termo }}"</span></h1>
    </div>

    @if($produtos->isEmpty())
        <div class="search-empty">
            <p>Nenhum produto encontrado para "{{ $termo }}"</p>
            <p>Tente buscar por outro termo ou navegue por nossas categorias.</p>
        </div>
    @else
        <ul class="search-results">
            @foreach($produtos as $produto)
                <li class="search-item">
                    <a href="{{ route('produto.show', $produto->id) }}" class="search-item-link">
                        <span class="search-item-name">{{ $produto->nome }}</span>
                        <span class="search-item-price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        
        @if(isset($produtos) && method_exists($produtos, 'links'))
            <div class="search-pagination">
                {{ $produtos->appends(['termo' => $termo])->links() }}
            </div>
        @endif
    @endif
</div>
@endsection