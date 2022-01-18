@extends('layouts.admin')

@section('content')

<div class="p-7">
    <div class="text-3xl font-bold">Add Post</div>

    <form action="{{ route('admin-posts-add') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-row w-full">
            <div class="p-5 w-auto flex-1 w-3/4">
                <input type="text" placeholder="Title" class="text-3xl font-bold outline-none w-full" id="title"
                    name="title">
                <hr class="mb-5 @error('title') border-rose-600 @enderror">
                @error('title')
                <div class="text-rose-600 mb-5">
                    {{ $message }}
                </div>
                @enderror
                <textarea id="editor" name="content"></textarea>
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
                        <option value="blog">Blog</option>
                        <option value="event">Event</option>
                        <option value="live-stream">Live Stream</option>
                        <option value="project">Project</option>
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
                        class="w-full outline-black outline rounded outline-1 p-1 focus:outline-primary">
                    @error('link')
                    <div class="text-rose-600 mb-5">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="p-5">
                    <label for="github">Github</label>
                    <input type="text" name="github" id="github"
                        class="w-full outline-black outline rounded outline-1 p-1 focus:outline-primary">
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
                        class="w-full outline-black outline rounded outline-1 p-1 focus:outline-primary"></textarea>
                    @error('tags')
                    <div class="text-rose-600 mb-5">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="p-5">
                    <button class="bg-primary text-white font-bold px-5 py-3 rounded" id="add"
                        type="submit">Add</button>
                    <a href="{{ route('admin-posts') }}"
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
    
    // // document elements
    // var title = document.querySelector('#title');
    // var type  = document.querySelector('#type');
    // var image = document.querySelector('#image');
    // var tags = document.querySelector('#tags');
    // var addBtn = document.querySelector('#add');

    // function submitPost() {
    //     var formData = new FormData();
    //     console.log({title.value, type.value, image})
    //     formData.append('title', title.value);
    //     formData.append('type', type.value);
    // }

</script>
@endsection