@extends('layouts.admin')

@section('content')
<div>
    <!-- Add User button -->
    <div class="mb-5 mt-16 flow-root">
        <button class="px-4 py-3 font-bold bg-primary text-white rounded-lg float-right">Add User</button>
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
                    <span class="text-primary font-bold mx-2 cursor-pointer">Edit</span>
                    <span class="text-red-600 font-bold mx-2 cursor-pointer">Delete</span>
                </td>
                @endif
            </tr>


            @endforeach

        </tbody>
    </table>
</div>
@endsection