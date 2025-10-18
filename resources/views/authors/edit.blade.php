@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Autor</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('authors.update', $author) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $author->name) }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nacionalidad</label>
                <input type="text" name="nationality" class="form-control" value="{{ old('nationality', $author->nationality) }}" required>
                @error('nationality') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection