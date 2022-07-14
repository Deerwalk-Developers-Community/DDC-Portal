@extends('layouts.admin')

@section('content')
<div>
    {{-- Notifications --}}
    @if (session('status'))
    <div class="p-5">
        <div class="bg-primary/[0.3] border-primary border-2 p-2 rounded-xl text-black font-bold">{{session('status')}}
        </div>
    </div>

    @endif

    <!-- Add User button -->
    <div class="mb-5 mt-16 flow-root">
        <a href="{{ route('admin.users-add') }}"
            class="px-4 py-3 font-bold bg-primary text-white rounded-lg float-right">Add User</a>
    </div>

    <!-- Post list table -->

    <table class="w-full table-auto">
        <!-- Table header -->
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left"></th>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-center">Role</th>
                @if (auth()->user()->role == 1 or auth()->user()->role == 2)
                <th class="py-3 px-6 text-center">Actions</th>
                @endif
            </tr>
        </thead>

        <!-- Table body -->
        <tbody class="text-black text-sm font-light">

            @foreach ($users as $u)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left">
                    <span class="w-10 h-10 block rounded-full bg-gray-400 ml-3"></span>
                </td>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    {{ $u->name }}
                </td>
                <td class="py-3 px-6 text-left">
                    {{ $u->email }}
                </td>
                <td class="py-3 px-6 text-center font-bold">
                    {{ $u->role }}
                </td>
                @if (auth()->user()->role == 1 or auth()->user()->role == 2)
                <td class="py-3 px-6 text-center">
                    <a href="{{ route('admin.users-edit', ['id' => $u->id]) }}"
                        class="text-primary font-bold mx-2 cursor-pointer">Edit</a>
                    <button class="text-red-600 font-bold mx-2 cursor-pointer delete-button" data-id="{{ $u->id }}">Delete</button>
                </td>
                @endif
            </tr>


            @endforeach

        </tbody>
    </table>
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
        dialogBody.innerText = "Are you sure you want to delete this user?";

        dialogConfirm.action = "{{ route('admin.users-delete', ['id' => ":id"]) }}".replace(":id", id);

        dialogConfirmButton.innerText = "Delete";

        dialog.classList.remove('hidden');
    }

    // init delete buttons
    for (var d of deleteButton) {
        d.addEventListener('click', deleteDialog);
    }

    })()

</script>

@endsection