@extends('layouts.main')

@section('modelo', 'Registrar produto')

@section('content')

<div id="product-create-container" class="col-md-6">  
    <form action="/products" method="POST" enctype="multipart/form-data" class="create-form corpo-create">
        <h1>Cadastrar placa de vídeo</h1>
        @csrf
        <div class="form-group">
            <label for="modelo">Nome do modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo do produto">
        </div>
        <div class="form-group">
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" class="form-control">
                <option value="ASUS">ASUS</option>
                <option value="EVGA">EVGA</option>
                <option value="GALAX">GALAX</option>
                <option value="GIGABYTE">GIGABYTE</option>
                <option value="MSI">MSI</option>
                <option value="PCYES">PCYES</option>
                <option value="PNY">PNY</option>
                <option value="XFX">XFX</option>
                <option value="ZOTAC">ZOTAC</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Configuração/descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Insira a descrição do produto"></textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" class="form-control" id="preco" name="preco" step="0.01">
        </div>
        <div class="form-group">
            <label for="image">Imagem do produto:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <input type="submit" class="btn btn-primary" value="Registrar produto">
    </form>
</div>

@endsection