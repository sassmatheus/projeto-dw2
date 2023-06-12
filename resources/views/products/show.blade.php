@extends('layouts.main')

@section('modelo', $product->modelo)

@section('content')

    <div class="div cold-md10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <h1>{{ $product->modelo }}</h1>
                <img src="/img/products/{{ $product->image }}" class="img-fluid img-show" alt="{{ $product->modelo }}">
            </div>
            <div id="info-container" class="col-md-6">
                <div class="col-md-12" id="description-container">
                    <h3>Descrição do produto:</h3>
                    <p class="product-description">{{ $product->descricao }}</p>
                </div> 
                <br><p class="products-owner">Produto inserido por: {{ $productOwner['name'] }}</p><br>
                @auth
                    <form action="/products/edit/{{ $product->id }}" method="POST">
                        @csrf
                        <a href="/products/edit/{{ $product->id }}" class="btn btn-primary" id="product-submit" onclick="product.preventDefault(); this.closest('form').submit();">Editar produto</a>
                    </form>
                    <form action="/products/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                    </form>
                @endauth
            </div>
            
        </div>
    </div>

@endsection