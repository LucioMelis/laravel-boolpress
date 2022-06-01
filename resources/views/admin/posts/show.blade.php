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
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
    <div class="mt-3">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
    </div>
@endsection
