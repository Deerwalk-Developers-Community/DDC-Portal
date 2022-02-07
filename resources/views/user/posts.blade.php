@extends('layouts.user')

@section('title')
Posts
@endsection

@section('content')
<div>
    <div class="bg-white">
        <nav class="flex flex-row">
            <button
                class="text-gray-600 font-bold py-4 px-6 block hover:text-primary focus:outline-none @if ($page == 'pending') text-primary border-b-2 border-primary @endif">
                <a href="{{ route('user-posts-pending') }}">Pending</a>
            </button>
            <button
                class="text-gray-600 font-bold py-4 px-6 block hover:text-primary focus:outline-none @if ($page == 'published') text-primary border-b-2 border-primary @endif">
                <a href="{{ route('user-posts-published') }}">Published</a>
            </button>
        </nav>
    </div>

    <div class="container">
        @foreach ($posts as $post)
        <div class="p-5">
            <h3 class="text-xl font-bold"><a href="{{ route('user-posts-edit', ['id'=> $post->id]) }}">{{ $post->title
                    }}</a></h3>
            <span>Created on {{ $post->created_at->format('d M, Y') }}</span>

            <a href="{{ route('user-posts-edit', ['id'=> $post->id]) }}"
                class="text-primary font-bold mx-2 cursor-pointer">Edit</a>

            <button class="text-red-600 font-bold mx-2 cursor-pointer delete-button"
                data-id="{{ $post->id }}">Delete</button>
        </div>
        <div class="border-b border-[#dedede] w-full md:w-1/2"></div>
        @endforeach
    </div>
</div>
@endsection


@section('script')
<script>
    (function() {
        var dialog = document.querySelector('#dialog');
        var dialogHeader = dialog.querySelector('#dialog-header');
        var dialogBody = dialog.querySelector('#dialog-body');
        var dialogFooter = dialog.querySelector('#dialog-footer');
        var dialogConfirm = dialog.querySelector('#dialog-confirm');
        var dialogConfirmButton = dialog.querySelector('#dialog-confirm-button');
        var deleteButton = document.getElementsByClassName('delete-button');


        // dialog delete button function
        function deleteDialog(e) {

            var id = e.target.getAttribute('data-id');

            dialogHeader.innerText = "Delete";
            dialogBody.innerText = "Are you sure you want to delete this post?";

            dialogConfirm.action = "{{ route('user-posts-delete', ['id' => ":id"]) }}".replace(":id", id);

            dialogConfirmButton.innerText = "Delete";

            dialog.classList.remove('hidden');
        }


        // init delete buttons
        for (var d of deleteButton) {
            d.addEventListener('click', deleteDialog);
        }

    }

)()


</script>
</script>

@endsection