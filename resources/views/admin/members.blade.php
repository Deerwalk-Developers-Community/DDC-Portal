@extends('layouts.admin')

@section('content')

<div class="p-7">
    <div class="text-3xl font-bold py-2">
        Members
    </div>

    <div class="text-xl font-bold py-2 flex justify-between items-end">
        <div>
            Executive Members
        </div>

        <a href="{{ route('admin-members-executive-add') }}" class="px-4 py-2 bg-primary text-white text-sm rounded">Add</a>
    </div>

    <hr>

    <div class="grid grid-cols-1 lg:grid-cols-2">
        @foreach ($executive_members as $member)
        <section class="flex flex-row">
            <div class="p-3">
                <img class="w-28 h-28 block rounded-full bg-gray-400 mt-3 mx-auto cursor-pointer"
                    @if ($member->image != "") src="{{ Storage::url('images/'. $member->image) }}" @endif id="profile-image"></img>
            </div>
            <div class="flex flex-col justify-center">
                <div class="font-bold">{{ $member->name }}</div>
                <div class="text-gray-500">Executive Member</div>
            </div>
        </section>


        @endforeach

    </div>
</div>

@endsection