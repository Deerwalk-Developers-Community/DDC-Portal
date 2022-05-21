@extends('layouts.admin')

@section('content')

{{-- Notifications --}}
@if (session('status'))
<div class="p-5">
    <div class="bg-primary/[0.3] border-primary border-2 p-2 rounded-xl text-black font-bold">{{session('status')}}
    </div>
</div>

@endif

<div>
    <div class="max-w-sm rounded overflow-hidden shadow-lg p-5">
        <form action="{{ route('admin.posts.featured')}}" method="post">
            @csrf
            <h3 class="text-xl font-bold">Featured post</h3>
            <select name="featured" id="featured" class="w-full p-1 mt-5">
                <option value=""></option>
                @foreach ($posts as $post)
                <option value="{{ $post->id }}" @if ($featured->id == $post->id) selected @endif>
                    {{ $post->title }} - {{ $post->user->name }}
                </option>

                @endforeach
            </select>
            <input type="submit" value="Apply" class="px-4 py-2 font-bold bg-primary text-white rounded-lg float-right mt-5 cursor-pointer">
        </form>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('js/admin/dashboard/featured_post.js') }}"></script>
@endsection