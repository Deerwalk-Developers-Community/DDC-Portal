@extends('layouts.admin')

@section('content')

<div class="p-7">
    <div class="text-3xl font-bold">{{ $page }}</div>

    <form
        action="@if ($edit) {{route('admin.posts.update', ['post' => $post->id])}} @else {{route('admin.posts.store')}} @endif"
        method="post" enctype="multipart/form-data">
        @if ($edit)
        @method('put')
        @endif
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
                <textarea id="editor" name="content"
                    class="hidden">{{ old('content', $post->content ?? '') }}</textarea>
                @error('content')
                <div class="text-rose-600 mb-5">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="p-5 w-72">
                <div class="p-5">
                    <label for="type" class="w-full block font-bold text-md mb-1">Type</label>
                    <select name="type" id="type" class="w-full" id="type">
                        <option value="blog" @if ( old('type', $post->type ?? '') == 'blog') selected @endif>Blog
                        </option>
                        <option value="event" @if ( old('type', $post->type ?? '') == 'event') selected @endif>Event
                        </option>
                        <option value="live-stream" @if (old('type', $post->type ?? '') == 'live-stream') selected
                            @endif>Live Stream</option>
                        <option value="project" @if (old('type', $post->type ?? '') == 'project') selected
                            @endif>Project</option>
                    </select>
                    @error('type')
                    <div class="text-rose-600 mb-5">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="p-5">
                    <label for="link">Link</label>
                    <input type="text" name="link" id="link"
                        class="w-full outline-black outline rounded outline-1 p-1 focus:outline-primary"
                        value="{{ old('link', $post->link ?? '') }}">
                    @error('link')
                    <div class="text-rose-600 mb-5">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="p-5">
                    <label for="github">Github</label>
                    <input type="text" name="github" id="github"
                        class="w-full outline-black outline rounded outline-1 p-1 focus:outline-primary"
                        value="{{ old('github', $post->github ?? '') }}">
                    @error('github')
                    <div class="text-rose-600 mb-5">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

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
                        Add
                        @endif</button>
                    <a href="{{ route('admin.posts.index') }}"
                        class="bg-rose-700 text-white font-bold px-5 py-3 rounded">Cancel</a>
                </div>

            </div>

    </form>


</div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/ckeditor.js') }}"></script>

<script>
    var editor = ClassicEditor.create(document.querySelector('#editor'));
    
</script>
@endsection