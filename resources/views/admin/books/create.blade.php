@extends('theme.default')

@section('head')
<style>
    .bg-sidebar {
        background: linear-gradient(to bottom, #6875f5, #00bcd4);
    }
</style>
@endsection

@section('heading')
Add New book
@endsection

@section('content')
<form action="{{route('books.store')}}" method="POST" class="mx-auto max-w-3xl" enctype="multipart/form-data">
    @csrf
    <div class="bg-white flex flex-col p-6 rounded-xl border-4 border-blue-400">
        <div class="items-center p-3 @error('title') flex-col @enderror justify-center">
            <div class="flex flex-col md:flex-row grow justify-between">
                <label for="title" class="p-2 text-xl mx-auto md:mx-0">Book Title</label>
                <input type="text" id="title" class="border-2 border-gray-300 md:w-4/5 w-full  rounded-lg @error('title') is-invalid @enderror" name="title">
            </div>

            <div class="flex justify-center mt-3">
                @error('title')
                <span>
                    <strong class="text-red-600 mx-auto">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="items-center p-3 @error('isbn') flex-col @enderror justify-center">
            <div class="flex flex-col md:flex-row grow justify-between">
                <label for="isbn" class="p-2 text-xl mx-auto md:mx-0">ISBN</label>
                <input type="text" id="isbn" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('title') is-invalid @enderror" name="isbn">
            </div>
            <div class="flex justify-center mt-3">
                @error('isbn')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="items-center p-3 @error('language') flex-col @enderror justify-center">
            <div class="flex flex-col md:flex-row grow justify-between">
                <label for="isbn" class="p-2 text-xl mx-auto md:mx-0">language</label>
                <input type="text" id="isbn" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('language') is-invalid @enderror" name="language">
            </div>
            <div class="flex justify-center mt-3">
                @error('language')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="items-center p-3 @error('title') flex-col @enderror justify-center">
            <div class="flex flex-col md:flex-row grow justify-between">
                <label class="p-2 text-xl mx-auto md:mx-0" for="cover_image">Cover Image</label>
                <input class="file:h-10 file:border-0 file:bg-blue-100 border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('title') is-invalid @enderror" onchange="readCoverImage(this);" id="cover_image" name="cover_image" type="file" accept="image/*">
            </div>
            <div class="flex justify-center mt-3">
                @error('cover_image')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
                <img id="cover-image-thumb" class="" src="">
            </div>
        </div>

        <!-- <div class="items-center p-3 @error('cover_image') flex-col @enderror justify-center">
            <div class="flex flex-col md:flex-row grow justify-between">
                <label for="publisher" class="p-2 text-xl mx-auto md:mx-0">Publisher</label>
                <input type="text" id="publisher" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('cover_image') is-invalid @enderror" name="publisher ">
            </div>
            <div class="flex justify-center mt-3">
                @error('publisher')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div> -->

        <div class="items-center p-3 @error('title') flex-col @enderror justify-center">
            <div class="flex flex-col md:flex-row grow justify-between">
                <label for="category" class="p-2 text-xl mx-auto md:mx-0">Category</label>
                <select id="category" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('title') is-invalid @enderror p-2" name="category">
                    <option disabled selected class="text-gray-300">choose a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-center mt-3">
                @error('category')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="items-center p-3 @error('title') flex-col @enderror justify-center">
            <div class="flex flex-col md:flex-row grow justify-between">
                <label for="publisher" class="p-2 text-xl mx-auto md:mx-0">Publisher</label>
                <select id="publisher" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('title') is-invalid @enderror p-2" name="publisher">
                    <option disabled selected class="text-gray-300">choose a publisher</option>
                    @foreach($publishers as $publisher)
                    <option value="{{ $category->id }}">{{ $publisher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-center mt-3">
                @error('publisher')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
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

        <div class="items-center p-3 @error('number_of_copies') flex-col @enderror justify-center">
        <div class="flex flex-col md:flex-row grow justify-between">
            <label for="number_of_copies" class="p-2 text-xl mx-auto md:mx-0">Copies</label>
            <input type="number" id="number_of_copies" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('number_of_copies') is-invalid @enderror p-2" name="number_of_copies">
            </div>
            <div class="flex justify-center mt-3">
                @error('number_of_copies')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="items-center p-3 @error('number_of_pages') flex-col @enderror justify-center">
        <div class="flex flex-col md:flex-row grow justify-between">
            <label for="number_of_pages" class="p-2 text-xl mx-auto md:mx-0">Pages</label>
            <input type="number" id="number_of_pages" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('number_of_pages') is-invalid @enderror p-2" name="number_of_pages">
            </div>
            <div class="flex justify-center mt-3">
                @error('number_of_pages')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="items-center p-3 @error('title') flex-col @enderror justify-center">
        <div class="flex flex-col md:flex-row grow justify-between">
            <label for="publish_year" class="p-2 text-xl mx-auto md:mx-0">Publish Year</label>
            <input type="number" id="publish_year" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('title') is-invalid @enderror p-2" name="publish_year">
            </div>
            <div class="flex justify-center mt-3">
                @error('publish_year')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="items-center p-3 @error('title') flex-col @enderror justify-center">
        <div class="flex flex-col md:flex-row grow justify-between">
            <label for="price" class="p-2 text-xl mx-auto md:mx-0">Price</label>
            <input type="number" id="price" class="border-2 border-gray-300 md:w-4/5 w-full rounded-lg @error('title') is-invalid @enderror p-2" name="price">
            </div>
            <div class="flex justify-center mt-3">
                @error('price')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex md:flex-start p-3">
            <button type="submit" class="py-2 px-4 bg-sidebar text-white font-bold rounded-xl" style=" background: linear-gradient(to bottom, #6875f5, #00bcd4)">Add</button>
        </div>


    </div>
</form>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function readCoverImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            console.log('Image loaded:', e.target.result);
            $('#cover-image-thumb').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

</script>

@endsection
