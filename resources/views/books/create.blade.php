@extends('layouts.app')

@section('title', 'Agregar Libro')

@section('content')
    <h1 class="mb-3">Agregar Nuevo Libro</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Autor:</label>
            <select name="author_id" id="author_id" class="form-select" required>
                <option value="">Seleccione un autor</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Año:</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
