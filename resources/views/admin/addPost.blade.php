@extends('layouts.admin')

@section('content')

<div class="p-7">
    <div class="text-3xl font-bold">Add Post</div>

    <div class="flex flex">
        <div>
            <input type="text" placeholder="Title" class="">
            <div id="editor"></div>
        </div>

        <div>
            
        </div>


    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/ckeditor.js') }}"></script>

<script>
    ClassicEditor.create(document.querySelector('#editor'));
</script>
@endsection