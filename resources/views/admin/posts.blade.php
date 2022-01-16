@extends('layouts.admin')

@section('content')
<!-- Page Section -->

<!-- Search bar -->
<div class="relative my-5">
    <input type="text"
        class="rounded-full drop-shadow-md w-80 py-3 px-5 focus-visible:outline-none border border-gray-300 mx-auto block"
        placeholder="Search">
</div>

<!-- Add post button -->
<div class="mb-5 flow-root">
    <a href="{{ route('admin-posts-add') }}" class="px-4 py-3 font-bold bg-primary text-white rounded-lg float-right">Add Post</a>
</div>

<!-- Post list table -->

<table class="w-full table-auto">
    <!-- Table header -->
    <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Title</th>
            <th class="py-3 px-6 text-left">Description</th>
            <th class="py-3 px-6 text-center">Type</th>
            <th class="py-3 px-6 text-center">Actions</th>
        </tr>
    </thead>

    <!-- Table body -->
    <tbody class="text-black text-sm font-light">
        <!-- row 1 -->
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap w-1/5 cursor-pointer">
                Lorem ipsum dolor sit amet.
            </td>
            <td class="py-3 px-6 text-left w-2/5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin malesuada
                scelerisque. Aliquam maximus tellus non magna commodo maximus. Mauris eu feugiat lectus,
                sed mollis risus. Curabitur sem sem, luctus.
            </td>
            <td class="py-3 px-6 text-center w-1/5 font-bold">
                Blog
            </td>
            <td class="py-3 px-6 text-center w-1/5">
                <span class="text-primary font-bold mx-2 cursor-pointer">Edit</span>
                <span class="text-red-600 font-bold mx-2 cursor-pointer">Delete</span>
            </td>
        </tr>
        <!-- row 2 -->
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap w-1/5 cursor-pointer">
                Lorem ipsum dolor sit amet.
            </td>
            <td class="py-3 px-6 text-left w-2/5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin malesuada
                scelerisque. Aliquam maximus tellus non magna commodo maximus. Mauris eu feugiat lectus,
                sed mollis risus. Curabitur sem sem, luctus.
            </td>
            <td class="py-3 px-6 text-center w-1/5 font-bold">
                Blog
            </td>
            <td class="py-3 px-6 text-center w-1/5">
                <span class="text-primary font-bold mx-2 cursor-pointer">Edit</span>
                <span class="text-red-600 font-bold mx-2 cursor-pointer">Delete</span>
            </td>
        </tr>
        <!-- row 3 -->
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap w-1/5 cursor-pointer">
                Lorem ipsum dolor sit amet.
            </td>
            <td class="py-3 px-6 text-left w-2/5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin malesuada
                scelerisque. Aliquam maximus tellus non magna commodo maximus. Mauris eu feugiat lectus,
                sed mollis risus. Curabitur sem sem, luctus.
            </td>
            <td class="py-3 px-6 text-center w-1/5 font-bold">
                Blog
            </td>
            <td class="py-3 px-6 text-center w-1/5">
                <span class="text-primary font-bold mx-2 cursor-pointer">Edit</span>
                <span class="text-red-600 font-bold mx-2 cursor-pointer">Delete</span>
            </td>
        </tr>

    </tbody>
</table>


<!-- End of Page section -->

@endsection