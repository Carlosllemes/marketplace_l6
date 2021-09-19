@extends('layouts.app')

@section('content')
        <form action="{{route('admin.stores.store')}}" method="POST">
            @csrf
    <div class="row g-4">
        <div class="col-4">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" name="name" id="id-1" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
            @error('name')
            <span class="invalid-feedback" ><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-4">
            <label for="Descriacao" class="form-label">Descriacao</label>
            <input type="text" name="description" id="id-2" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
            @error('description')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-4">
            <label for="Telefone" class="form-label">Telefone</label>
            <input type="text" name="phone" id="id-3" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
            @error('phone')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-4">
            <label for="Celular/Whatsapp" class="form-label">Celular/Whatsapp</label>
            <input type="text" name="mobile_phone" id="id-4" class="form-control @error('mobile_phone') is-invalid @enderror" value="{{ old('mobile_phone') }}">
            @error('mobile_phone')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-4">
            <label for="Slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="id-5" class="form-control">

        </div>
{{--        <div class="col-4">--}}
{{--            <label for="Usuario" class="form-label">Usuario</label>--}}
{{--            <select class="form-control" name="user" id="id-6">--}}
{{--                @foreach($clientes as $cliente)--}}
{{--                    <option value="{{$cliente->id}}">{{$cliente->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
    </div>
            <button type="submit" class="btn btn-success btn-lg mt-3">Criar</button>
        </form>
@endsection
