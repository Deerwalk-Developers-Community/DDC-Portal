@extends('layouts.admin')

@section('content')
<!-- Page Section -->

<!-- Search bar -->
<div class="relative my-5">
    <input type="text"
        class="rounded-full drop-shadow-md w-80 py-3 px-5 focus-visible:outline-none border border-gray-300 mx-auto block"
        placeholder="Search">
</div>

{{-- Notifications --}}
@if (session('status'))
<div class="p-5">
    <div class="bg-primary/[0.3] border-primary border-2 p-2 rounded-xl text-black font-bold">{{session('status')}}
    </div>
</div>

@endif


<!-- Add post button -->
<div class="mb-5 flow-root">
    <a href="{{ route('admin.posts.create') }}"
        class="px-4 py-3 font-bold bg-primary text-white rounded-lg float-right">Add Post</a>
</div>

<!-- Post list table -->

<table class="w-full table-auto">
    <!-- Table header -->
    <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Title</th>
            <th class="py-3 px-6 text-left">Author</th>
            <th class="py-3 px-6 text-center">Type</th>
            <th class="py-3 px-6 text-center">Published</th>
            <th class="py-3 px-6 text-center">Actions</th>
        </tr>
    </thead>

    <!-- Table body -->
    <tbody class="text-black text-sm font-light">
        <!-- row 1 -->

        @foreach ($posts as $post)
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap w-2/8 cursor-pointer">
                {{ $post->title }}
            </td>
            <td class="py-3 px-6 text-left w-2/8">
                {{ $post->user->name }}
            </td>
            <td class="py-3 px-6 text-center w-1/8 font-bold">
                {{ $post->type }}
            </td>
            <td class="py-3 px-6 text-center w-1/8 font-bold">
                {{ $post->published ? 'Yes' : 'No' }}
            </td>
            <td class="py-3 px-6 text-center w-2/8">
                <button class="text-primary font-bold mx-2 cursor-pointer publish-button" data-id="{{ $post->id }}"
                    data-publish="{{ !$post->published }}">{{ $post->published ? 'Unpublish' : 'Publish'
                    }}</a>
                    <a href="{{ route('admin.posts.edit', ['post'=> $post->id]) }}"
                        class="text-primary font-bold mx-2 cursor-pointer">Edit</a>
                    <button class="text-red-600 font-bold mx-2 cursor-pointer delete-button"
                        data-id="{{ $post->id }}">Delete</button>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>


<!-- End of Page section -->

@endsection

@section('script')

<script defer="true">
    (function() {
        var dialog = document.querySelector('#dialog');
        var dialogHeader = dialog.querySelector('#dialog-header');
        var dialogBody = dialog.querySelector('#dialog-body');
        var dialogFooter = dialog.querySelector('#dialog-footer');
        var dialogConfirm = dialog.querySelector('#dialog-confirm');
        var dialogConfirmButton = dialog.querySelector('#dialog-confirm-button');
        var deleteButton = document.getElementsByClassName('delete-button');
        var publishButton = document.getElementsByClassName('publish-button');


        // dialog delete button function
        function deleteDialog(e) {

            var id = e.target.getAttribute('data-id');

            dialogHeader.innerText = "Delete";
            dialogBody.innerText = "Are you sure you want to delete this post?";

            dialogConfirm.action = "{{ route('admin.posts.destroy', ['post' => ":id"]) }}".replace(":id", id);

            dialogConfirmButton.innerText = "Delete";
            dialogConfirm.innerHTML += '<input type="hidden" name="_method" value="DELETE">'; 

            dialog.classList.remove('hidden');
        }

        // dialog publish button function
        function publishDialog(e) {
            var id = e.target.getAttribute('data-id');

            var publish = e.target.getAttribute('data-publish');

            var publish_text =  publish ? "Publish" : "Unpublish";

            dialogHeader.innerText = publish_text;

            dialogConfirm.action = "{{ route('admin.posts.publish', ['id' => ":id", 'publish' => ":publish"]) }}".replace(":id", id).replace(":publish", publish ? "publish" : "unpublish");


            dialogBody.innerText = `Do you want to ${publish_text} this post?`;

            dialogConfirmButton.innerText = publish_text;

            dialog.classList.remove('hidden');

        }

        // init delete buttons
        for (var d of deleteButton) {
            d.addEventListener('click', deleteDialog);
        }

        // init publish button
        for (var p of publishButton) {
            p.addEventListener('click', publishDialog);
        }



    }

)()


</script>

@endsection