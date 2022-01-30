@extends('layouts.admin')

@section('content')

<div class="p-7">
    <div class="text-3xl font-bold py-2">
        Members
    </div>
    {{-- Notifications --}}
    @if (session('status'))
    <div class="p-5">
        <div class="bg-primary/[0.3] border-primary border-2 p-2 rounded-xl text-black font-bold">{{session('status')}}
        </div>
    </div>

    @endif


    <div class="text-xl font-bold py-2 flex justify-between items-end">
        <div>
            Executive Members
        </div>

        <a href="{{ route('admin-members-executive-add') }}"
            class="px-4 py-2 bg-primary text-white text-sm rounded">Add</a>
    </div>

    <hr>

    <div class="grid grid-cols-1 lg:grid-cols-2">
        @foreach ($executive_members as $member)
        <section class="flex flex-row">
            <div class="p-3">
                <img class="w-28 h-28 block rounded-full bg-gray-400 mt-3 mx-auto cursor-pointer" @if ($member->image !=
                "") src="{{ Storage::url('images/'. $member->image) }}" @endif id="profile-image"></img>
            </div>
            <div class="flex flex-col justify-center">
                <div class="font-bold">{{ $member->name }}</div>
                <div class="text-gray-500">Executive Member</div>
                <div class="flex flex-row">
                    <div class="cursor-pointer">
                        <a href="{{ route('admin-members-executive-edit', ['id'=>$member->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                viewBox="0 0 24 24" style=" fill:#000000;">
                                <path
                                    d="M 18.414062 2 C 18.158188 2 17.902031 2.0974687 17.707031 2.2929688 L 16 4 L 20 8 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.925594 2.0974687 18.669937 2 18.414062 2 z M 14.5 5.5 L 3 17 L 3 21 L 7 21 L 18.5 9.5 L 14.5 5.5 z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                            viewBox="0 0 24 24" style=" fill:#000000;">
                            <path
                                d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z">
                            </path>
                        </svg>
                    </div>

                </div>
            </div>
        </section>


        @endforeach

    </div>
</div>

@endsection