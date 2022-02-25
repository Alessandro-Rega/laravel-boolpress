@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header mb-4">
                <h5>Crea Tag</h5>
            </div>
            <form action="{{route('tags.store')}}" method="POST" class="my-4">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome" value="{{old('name')}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Crea</button>
            </form>
            <a href="{{route('tags.index')}}"><button type="button" class="btn btn-primary">Indietro</button></a>
        </div>
    </div>
</div>
@endsection