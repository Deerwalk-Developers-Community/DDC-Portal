@extends('layouts.user')

@section('content')

<form action="@if ($edit) {{route('user-posts-edit', ['id' => $post->id])}} @else {{route('user-posts-create')}} @endif"
    method="post" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-row w-full">
        <div class="p-5 w-auto flex-1 w-3/4">
            <input type="text" placeholder="Title" class="text-3xl font-bold outline-none w-full" id="title"
                name="title" value="{{ old('title', $post->title ?? '') }}">
            <hr class="mb-5 @error('title') border-rose-600 @enderror">
            @error('title')
            <div class="text-rose-600 mb-5">
                {{ $message }}
            </div>
            @enderror
            <textarea id="editor" name="content" class="hidden">{{ old('content', $post->content ?? '') }}</textarea>
            @error('content')
            <div class="text-rose-600 mb-5">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div class="p-5 w-72">


            <div class="p-5">
                <label for="image" class="block w-full font-bold text-md mb-1">Image</label>
                <input type="file" src="" alt="" name="image" id="image" class="w-full">
                @error('image')
                <div class="text-rose-600 mb-5">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="p-5">
                <label for="tags" class="w-full block font-bold text-md mb-1">Tags</label>
                <textarea name="tags" id="tags" cols="30" rows="3"
                    class="w-full outline-black outline rounded outline-1 p-1 focus:outline-primary">{{ old('tags', $post->tags ?? '') }}</textarea>
                @error('tags')
                <div class="text-rose-600 mb-5">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="p-5">
                <button class="bg-primary text-white font-bold px-5 py-3 rounded" id="add" type="submit">@if ($edit)
                    Edit
                    @else
                    Post
                    @endif</button>
                <a href="{{ route('user-posts-pending') }}"
                    class="bg-rose-700 text-white font-bold px-5 py-3 rounded">Cancel</a>
            </div>

        </div>

</form>

@endsection


@section('script')
<script src="{{ asset('js/ckeditor.js') }}"></script>

<script>
    var editor = ClassicEditor.create(document.querySelector('#editor'));
</script>

@endsection