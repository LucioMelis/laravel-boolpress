@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{-- Title card --}}
                <div class="card">
                    <div class="card-header">Write a new Post</div>

                    {{-- / Title card --}}
                    <div class="card-body">
                        <form action="{{ route('admin.posts.store') }}" method="POST">
                            {{-- Token --}}
                            @csrf
                            {{-- / Token --}}

                            {{-- title post --}}
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror "
                                    placeholder="Post's title">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- / categories post --}}
                            <div class="form-group">
                                <label>Categoria Post:</label>

                                <select name="category_id" class="@error('category_id') is-invalid @enderror">
                                    <option value="">--Seleziona la Categoria--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{-- Per poter avere il SELECTED solo su quello selezionato agiamo con un ternario --}}
                                            {{ $category->id == old('category_id') ? 'selected' : '' }}>
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

                            {{-- content post --}}
                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Post's content"></textarea>
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- input Tag checkbox --}}
                            <div class="form-group">
                                <p>Tags:</p>
                                @foreach ($tags as $tag)
                                    <input type="checkbox" value="{{ $tag->id }}" name="tags[]" {{-- {{ in_array($tag->id, old('tags[]', [])) ? 'checked' : '' }} --}}
                                        {{ count(tags[]) > 0 ? 'checked' : '' }}
                                        class="form-check-input @error('tags') is-invalid @enderror ">
                                    <div class="form-check-label">{{ $tag->name }}</div>
                                @endforeach

                                @error('tags[]')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- button submit --}}
                            <div class="form-group">
                                <input type="submit" class="btn btn-info white" value="Create Post">
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-success"> Back</a>

            </div>
        </div>
    </div>
@endsection
