@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{-- Title card --}}
                <div class="card">
                    <div class="card-header">Edit a Post</div>

                    <div class="card-body">
                        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                            {{-- Token --}}
                            @csrf
                            {{-- / Token --}}

                            {{-- Modifica title post --}}
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror "
                                    placeholder="Post's title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- modifica category select --}}

                            <div class="form-group">
                                <label>Categoria Post:</label>

                                <select name="category_id">
                                    <option value="">--Seleziona la Categoria--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{-- Per poter avere il SELECTED solo su quello selezionato agiamo con un ternario --}}
                                            {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Modifica content --}}
                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Post's content">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- / content post --}}

                            {{-- Modifica Checkbox tag --}}
                            <div class="form-group">
                                <p>Tags:</p>
                                @foreach ($tags as $tag)
                                    <input type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                        {{ $post->tags->contains($tag) ? 'checked' : '' }}
                                        class="form-check-input @error('tags') is-invalid @enderror ">
                                    <div class="form-check-label">{{ $tag->name }}</div>
                                @endforeach

                                @error('tags[]')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Invio del form --}}
                            <div class="form-group">
                                <input type="submit" class="btn btn-info white" value="Edit Post">
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-success"> Back</a>

            </div>
        </div>
    </div>
@endsection
