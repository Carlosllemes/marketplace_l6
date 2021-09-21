@extends('layouts.app')

@section('content')
        <form action="{{route('admin.stores.update', $store->id)}}" method="POST">
            @csrf
    <div class="row g-4">
        <div class="col-4">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" name="name" id="id-1" class="form-control" value="{{$store->name}}">
        </div>
        <div class="col-4">
            <label for="Descriacao" class="form-label">Descriacao</label>
            <input type="text" name="description" id="id-2" class="form-control" value="{{$store->description}}">
        </div>
        <div class="col-4">
            <label for="Telefone" class="form-label">Telefone</label>
            <input type="text" name="phone" id="id-3" class="form-control" value="{{$store->phone}}">
        </div>
        <div class="col-4">
            <label for="Celular/Whatsapp" class="form-label">Celular/Whatsapp</label>
            <input type="text" name="mobile_phone" id="id-4" class="form-control" value="{{$store->mobile_phone}}">
        </div>
        <div class="col-4">
            <label for="Slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="id-5" class="form-control" value="{{$store->slug}}">
        </div>


    </div>
            <button type="submit" class="btn btn-success btn-lg mt-3">Editar</button>
        </form>
@endsection
