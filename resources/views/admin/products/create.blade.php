@extends('layouts.app')

@section('content')
        <form action="{{route('admin.products.store')}}" method="POST">
            @csrf
    <div class="row g-4">
        <div class="col-6">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" name="name" id="id-1" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="Descriacao" class="form-label">Descriacao</label>
            <input type="text" name="description" id="id-2" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror">
            @error('description')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="col-12">
            <label for="Conteudo" class="form-label">Conteudo</label>
            <textarea value="{{old('body')}}" class="form-control  @error('body') is-invalid @enderror" name="body"  cols="30" rows="10"></textarea>
            @error('body')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="Preco" class="form-label">Preco</label>
            <input type="text" name="price" id="id-4" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror">
            @error('price')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="Slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="id-5" value="{{old('slug')}}" class="form-control">
        </div>

    </div>
            <button type="submit" class="btn btn-success btn-lg mt-3">Criar</button>
        </form>
@endsection
