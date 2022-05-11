@extends('layouts.admin')

@section('content')
{{-- Page Section --}}
<div class="p-7">
    <span class="text-3xl font-bold py-2">
        {{ $page }}
    </span>

    <form
        action="@if ($edit) {{ route('admin.members-executive-edit', ['id'=> $member->id ?? '']) }} @else{{ route('admin.members-executive-add') }} @endif"
        method="post" class="mt-5" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col md:flex-row">
            <div class="p-7 w-1/3">
                <img class="w-28 h-28 block rounded-full bg-gray-400 mt-3 mx-auto cursor-pointer" @if ($member->image ??
                false !=
                "") src="{{ '/storage/images/'. $member->image }}" @endif
                id="profile-image"></img>
                <input type="file" src="" alt="" class="hidden" id="profile-image-input" name="image">
                @error('image')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="flex flex-col">
                <section class="py-5">
                    <label for="name" class="text-lg font-bold mr-3">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $member->name ?? '') }}"
                        class="@error('name') outline-rose-600 @else outline-black @enderror outline rounded outline-1 p-1 focus:outline-primary w-full">
                    @error('name')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </section>

                <section class="py-5">
                    <label for="github" class="text-lg font-bold mr-3">Github</label>
                    <input type="text" name="github" id="github" value="{{ old('github', $member->github ?? '') }}"
                        class="@error('github') outline-rose-600 @else outline-black @enderror outline rounded outline-1 p-1 focus:outline-primary w-full">

                    @error('github')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </section>

                <section class="py-5">
                    <label for="linkedin" class="text-lg font-bold mr-3">Linkedin</label>
                    <input type="text" name="linkedin" id="linkedin"
                        value="{{ old('linkedin', $member->linkedin ?? '') }}"
                        class="@error('linkedin') outline-rose-600 @else outline-black @enderror outline rounded outline-1 p-1 focus:outline-primary w-full">

                    @error('linkedin')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </section>


                <button type="submit" class="bg-primary font-bold text-white p-3 mt-7 rounded">
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

@endsection


@section('script')

<script language="javascript">
    // Profile image display 
    window.addEventListener('DOMContentLoaded', function() {
        var profileImage = document.getElementById('profile-image');
        var profileImageInput = document.getElementById('profile-image-input');

        profileImage.addEventListener('click', function() {
            profileImageInput.click();
        })
    });
</script>

@endsection