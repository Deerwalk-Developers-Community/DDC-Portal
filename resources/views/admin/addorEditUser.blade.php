@extends('layouts.admin')

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
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password2">
                        Role
                    </label>
                </div>
                <div class="md:w-2/3 relative">
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state" name="role">
                        <option value="1" @if (old('role', $user->role ?? '') == 1) selected @endif>Admin</option>
                        <option value="2" @if (old('role', $user->role ?? '') == 2) selected @endif>Moderator</option>
                        <option value="3" @if (old('role', $user->role ?? '') == 3) selected @endif>Member</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                    @error('role')
                    <div class='text-rose-600'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

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