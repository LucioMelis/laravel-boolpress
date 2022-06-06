@extends('layouts.dashboard')
@section('content')
    <div>
        {{-- LINK ALLA PAGINA DI EDIT POST --}}
        <a href="{{ route('admin.posts.edit', $post->id) }}">
            <i class="fas fa-edit fa-2xl mx-3"></i>
        </a>
        {{-- BUTTON PER CANCELLARE UN POST --}}
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class=" d-inline-block">
            @csrf
            @method('DELETE')
            <button type='submit' onclick="return confirm('Sicuro di voler cancellare questo post?')" type="submit" value=""
                class="btn btn-danger">
                <i class="fas fa-trash-alt">Elimina Post</i>
            </button>
        </form>
    </div>
    <div class="mt-3">
        <h3>Titolo</h3>
        <p>{{ $post->title }}</p>
        <h3>Slug</h3>
        <p>{{ $post->slug }}</p>
        <h3>Contenuto</h3>
        <p>{{ $post->content }}</p>
        {{-- $post viene mandato dallo show, category è la funzione presente nel modello post, name è l'attributo presente nella colonna della tabella category --}}
        {{-- questo perchè ci sono delle relazioni tra le tabelle --}}
        <h3>Categoria</h3>
        <p>{{ $post->category->name }}</p>
        <h3>Tags</h3>
        {{-- @foreach ($post->tags as $tag)
            <span>{{ $tag->name }}</span>
        @endforeach --}}
        @forelse ($post->tags as $tag)
            <p>{{ $tag->name }}</p>
        @empty
            <p>Not found</p>
        @endforelse
        <button class="btn btn-success">
            <a href="{{ route('admin.posts.index') }}">Torna ai Post</a>
        </button>

    </div>
@endsection
