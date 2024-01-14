@extends('theme.default')


@section('head')
<style>
    .bg-sidebar {
        background: linear-gradient(to bottom, #6875f5, #00bcd4);
    }
</style>
@endsection

@section('heading')
Add New Category
@endsection

@section('content')
<form action="{{route('admin.categories.store')}}" method="POST" class="mx-auto max-w-3xl">
    @csrf
    <div class="bg-white flex flex-col p-6 rounded-xl border-4 border-blue-400">
        <div class="items-center p-3 @error('name') flex-col @enderror justify-center">
            <div class="flex flex-col md:flex-row grow justify-between">
                <label for="name" class="p-2 text-xl mx-auto md:mx-0">Name</label>
                <input type="text" id="name" class="border-2 border-gray-300 md:w-4/5 w-full  rounded-lg @error('name') is-invalid @enderror" name="name">
            </div>

            <div class="flex justify-center mt-3">
                @error('name')
                <span>
                    <strong class="text-red-600 mx-auto">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>





        <div class="items-center p-3 @error('description') flex-col @enderror justify-center">
        <div class="flex flex-col md:flex-row grow justify-between">
            <label for="description" class="p-2 text-xl mx-auto md:mx-0">Description</label>
            <textarea name="description" id="description" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('description') is-invalid @enderror p-2 h-24"></textarea>
            </div>
            <div class="flex justify-center mt-3">
                @error('description')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>


        </div>

        <div class="flex md:flex-start p-3">
            <button type="submit" class="py-2 px-4 bg-sidebar text-white font-bold rounded-xl" style=" background: linear-gradient(to bottom, #6875f5, #00bcd4)">Save</button>
        </div>


    </div>
</form>
@endsection
