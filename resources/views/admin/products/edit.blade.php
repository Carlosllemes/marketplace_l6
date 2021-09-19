@extends('layouts.app')

@section('content')
        <form action="{{route('admin.products.update', ['product'=> $products->id])}}" method="POST">
            @csrf
            @method('PUT')
    <div class="row g-4">
        <div class="col-6">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" name="name" id="id-1" class="form-control" value="{{$products->name}}">
        </div>
        <div class="col-6">
            <label for="Descriacao" class="form-label">Descriacao</label>
            <input type="text" name="description" id="id-2" class="form-control" value="{{$products->description}}">
        </div>
        <div class="col-12">
            <label for="Conteudo" class="form-label">Conteudo</label>
            <textarea name="body"  cols="30" rows="10" class="form-control">{{$products->body}}</textarea>
        </div>
        <div class="col-4">
            <label for="Preco" class="form-label">Preco</label>
            <input type="text" name="price" id="id-4" class="form-control" value="{{$products->price}}">
        </div>
        <div class="col-4">
            <label for="Slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="id-5" class="form-control" value="{{$products->slug}}">
        </div>
        <div class="col-4">
            <label for="Usuario" class="form-label">Loja</label>
            <select class="form-control" name="store" id="id-6">

            </select>
        </div>

    </div>
            <button type="submit" class="btn btn-success btn-lg mt-3">Editar</button>
        </form>
@endsection
