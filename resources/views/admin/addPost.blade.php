@extends('layouts.admin')

@section('content')

<div class="p-7">
    <div class="text-3xl font-bold">Add Post</div>

    <div class="flex flex-row w-full">
        <div class="p-5 w-auto flex-1 w-3/4">
            <input type="text" placeholder="Title" class="text-3xl font-bold outline-none">
            <hr class="mb-5">
            <div id="editor"></div>
        </div>

        <div class="p-5 w-72">
            <div class="p-5">

                <label for="type" class="w-full block font-bold text-md mb-1">Type</label>
                <select name="type" id="type" class="w-full">
                    <option value="blog">Blog</option>
                    <option value="event">Event</option>
                    <option value="live-stream">Live Stream</option>
                    <option value="project">Project</option>
                </select>
            </div>

            <div class="p-5">
                <label for="image" class="block w-full font-bold text-md mb-1">Image</label>
                <input type="file" name="image" id="image" class="w-full">
            </div>

            <div class="p-5">
                <label for="tags" class="w-full block font-bold text-md mb-1">Tags</label>
                <textarea name="tags" id="tags" cols="30" rows="3" class="w-full outline-black outline rounded outline-1 p-1 focus:outline-primary w-full"></textarea>
            </div>

            <div class="p-5">
                <button class="bg-primary text-white font-bold px-5 py-3 rounded">Add</button>
                <a href="{{ route('admin-posts') }}" class="bg-rose-700 text-white font-bold px-5 py-3 rounded">Cancel</a>
            </div>

        </div>


    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/ckeditor.js') }}"></script>

<script>
    var editor = ClassicEditor.create(document.querySelector('#editor'));
</script>
@endsection