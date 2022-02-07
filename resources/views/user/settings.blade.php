@extends('layouts.user')

@section('content')
<div class="p-7">
    <div class="text-3xl font-bold">{{ $page }}</div>
    <div class="grid place-content-center mt-40">
        <form class="w-full max-w-sm"
            action="@if ($edit) {{ route('admin-users-edit', ['id'=>$user->id ?? '']) }} @else {{ route('admin-users-add') }} @endif"
            method="POST">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Full Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 @error('name') border-rose-600 @else border-gray-200 @enderror rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-primary"
                        id="inline-full-name" type="text" name="name" value="{{ old('name', $user->name ?? '') }}">
                    @error('name')
                    <div class='text-rose-600'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
                        Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 @error('email') border-rose-600 @else border-gray-200 @enderror rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-primary"
                        id="email" type="text" name="email" value="{{ old('email', $user->email ?? '') }}">
                    @error('email')
                    <div class='text-rose-600'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            @if (!$edit)
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Password
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 @error('password') border-rose-600 @else border-gray-200 @enderror rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-primary"
                        id="inline-password" type="password" name="password">
                    @error('password')
                    <div class='text-rose-600'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password2">
                        Confirm Password
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 @error('password_confirmation') border-rose-600 @else border-gray-200 @enderror rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-primary"
                        id="inline-password2" type="password" name="password_confirmation">
                    @error('password_confirmation')
                    <div class='text-rose-600'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            @endif

            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-primary hover:bg-primary-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-full"
                        type="submit">
                        @if ($edit)
                        Edit
                        @else
                        Add
                        @endif
                    </button>
                </div>
            </div>
        </form>


    </div>

</div>
@endsection