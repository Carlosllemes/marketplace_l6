@extends('layouts.app')

@section('content')
        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
    <div class="row g-4">
        <div class="col-6">
            <label for="Nome" class="form-label mt-2">Nome</label>
            <input type="text" name="name" id="id-1" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="Descriacao" class="form-label mt-2">Descriacao</label>
            <input type="text" name="description" id="id-2" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror">
            @error('description')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="col-12">
            <label for="Conteudo" class="form-label mt-2">Conteudo</label>
            <textarea value="{{old('body')}}" class="form-control  @error('body') is-invalid @enderror" name="body"  cols="30" rows="10"></textarea>
            @error('body')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="Preco" class="form-label mt-2">Preco</label>
            <input type="text" name="price" id="id-4" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror">
            @error('price')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>


        <div class="col-6">
            <label class="form-label mt-2">Categorias</label>
            <select name="categories[]" class="form-control" multiple="categories[]">
            @foreach( $categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="col-6">
            <label for="Slug" class="form-label mt-2">Slug</label>
            <input type="text" name="slug" id="id-5" value="{{old('slug')}}" class="form-control">
        </div>

        <div class="col-12">
            <label for="image" class="form-label">Imagem</label>
            <input name="images[]" multiple type="file" class="form-control @error('images') is-invalid @enderror">
            @error('images')
            <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>

    </div>
            <button type="submit" class="btn btn-success btn-lg mt-3">Criar</button>
        </form>
@endsection



