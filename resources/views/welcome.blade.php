@extends('layouts.main')

@section('modelo', 'Projeto DW2')

@section('content')

<div id="products-container">
    @if($search)
        <h2 class="welcome-title">Buscando por: {{ $search }}</h2>
    @else
        <h2 class="welcome-title">Placas de vídeo</h2>
    @endif
    <p class="subtitle"></p>
    <div id="cards-container" class="row corpo-card">
        @foreach($products as $product)
            <div class="card col-md-4">
                <div class="card-body">
                    <h5 class="card-modelo">{{ $product->modelo }}</h5>
                    <img src="/img/products/{{ $product->image }}" alt="{{ $product->modelo }}">
                    <p class="card-participants">Fabricante: {{ $product->fabricante }}</p>
                    <p class="card-participants">R$ {{ $product->preco }}</p>
                    <a href="/products/{{ $product->id }}" class="btn btn-primary">Detalhes</a>
                </div>
            </div>
        @endforeach
        @if(count($products) == 0 && $search)
            <p>Não foi possível encontrar nenhum produto com {{ $search }}.</p>
            <a href="/">Ver todos os produtos.</a>
        @elseif(count($products) == 0)
            <p>Não há produtos cadastrados.</p>
        @endif
    </div>
</div>

@endsection