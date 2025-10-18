@extends('layouts.app')

@section('title', 'Editar Libro')

@section('content')
    <h1 class="mb-3">Editar Libro</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Autor:</label>
            <select name="author_id" id="author_id" class="form-select" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Año:</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $book->year }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
