@extends('layouts.app')

@section('content')
        <form action="{{route('admin.products.update', ['product'=> $products->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    <div class="row g-4">
        <div class="col-6">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" name="name" value="{{$products->name}} " id="id-1" class="form-control" >
        </div>
        <div class="col-6">
            <label for="Descriacao" class="form-label">Descriacao</label>
            <input type="text" name="description" value="{{$products->description}}" id="id-2" class="form-control" value="{{$products->description}}">
        </div>
        <div class="col-12">
            <label for="Conteudo" class="form-label">Conteudo</label>
            <textarea name="body" value="{{$products->body}}"  cols="30" rows="10" class="form-control">{{$products->body}}</textarea>
        </div>
        <div class="col-4">
            <label for="Preco" class="form-label">Preco</label>
            <input type="text" name="price" value="{{$products->price}}" id="id-4" class="form-control" value="{{$products->price}}">
        </div>

        <div class="col-6">
            <label class="form-label mt-2">Categorias</label>
            <select name="categories[]" class="form-control" multiple="categories[]">
                @foreach( $categories as $c)
                    <option value="{{$c->id}}"  @if($products->categories->contains($c)) selected @endif>
                        {{$c->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6">
            <div class="col-12">
                <label for="image" class="form-label">Imagem</label>
                <input name="images[]" multiple type="file" class="form-control @error('images') is-invalid @enderror">
                @error('images')
                <span class="invalid-feedback">Arquivo de formato invalido</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="box d-flex flex-row">
                <form>
                @csrf
                @foreach($products->images as $image)
                    <div class="position-relative border m-2">
                        <img style="height: 200px; width:200px; object-fit: contain;" src="{{asset('/storage/products/'.$image->image)}}" alt="Produto nome"/>
                            <input type="hidden" name="image" id="image-{{$image->id}}" value="{{$image->image}}">
                            <a class="btn btn-danger position-absolute btn-delete" data-name="{{$image->image}}"><i class="fas fa-trash"></i></a>
                    </div>
                @endforeach
                </form>
        </div>

        </div>

        <button type="submit" class="btn btn-success btn-lg mt-3">Editar</button>
    </div>
        </form>
@endsection
@section('footer-scripts')
    <script src="{{ asset('js/scripts/deleteimg.js') }}" defer></script>

@endsection
