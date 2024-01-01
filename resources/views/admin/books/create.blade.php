@extends('theme.default')

@section('head')
<style>
    .bg-sidebar { background: linear-gradient(to bottom, #6875f5, #00bcd4); }
</style>
@endsection

@section('heading')
Add New book
@endsection

@section('content')
<form action="route('books.store')" method="POST" class="mx-auto max-w-3xl" enctype="multipart/form-data">
    @csrf
    <div class="bg-white flex flex-col p-6 rounded-xl border-2 border-blue-400">
        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="title" class="p-2 text-xl flex grow">Book Title</label>
            <input type="text" id="title" class="border-2 border-gray-300 rounded-lg flex w-4/5 @error('title') is-invalid @enderror" name="title ">
            <div>
                @error('title')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="isbn" class="p-2 text-xl flex grow">ISBN</label>
            <input type="text" id="isbn" class="border-2 border-gray-300 rounded-lg flex w-4/5 @error('isbn') is-invalid @enderror" name="isbn ">
            <div>
                @error('isbn')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label class="p-2 text-xl flex grow" for="cover_image">Cover Image</label>
            <input class="file:h-10 file:border-0 file:bg-blue-100 border-2 border-gray-300 rounded-lg flex w-4/5 @error('isbn') is-invalid @enderror h-10" onchange="readCoverImage(this);" id="cover_image" name="cover_image" type="file" accept="images/*">
            <div>
                @error('cover_image')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
                <img id="cover-image-thumb" class="img-fluid img-thumbnail" src="">
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="publisher" class="p-2 text-xl flex grow">Publisher</label>
            <input type="text" id="publisher" class="border-2 border-gray-300 rounded-lg flex w-4/5 @error('publisher') is-invalid @enderror" name="publisher ">
            <div>
                @error('publisher')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="category" class="p-2 text-xl flex grow">Category</label>
            <select  id="category" class="p-2 border-2 border-gray-300 rounded-lg flex w-4/5 @error('category') is-invalid @enderror" name="category ">
                <option disabled  selected class="text-gray-300">choose a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div>
                @error('category')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="publisher" class="p-2 text-xl flex grow">Publisher</label>
            <select id="publisher" class="p-2 border-2 border-gray-300 rounded-lg flex w-4/5 @error('publisher') is-invalid @enderror" name="publisher ">
                <option disabled  selected class="text-gray-300">choose a publisher</option>
                @foreach($publishers as $publisher)
                    <option value="{{ $category->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
            <div>
                @error('publisher')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="description" class="p-2 text-xl flex grow">Description</label>
            <textarea name="description" id="description" class="border-2 border-gray-300 rounded-lg flex w-4/5 @error('publisher') is-invalid @enderror p-2 h-24"></textarea>
            <div>
                @error('description')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="number_of_copies" class="p-2 text-xl flex grow">Copies</label>
            <input type="number" id="number_of_copies" class="border-2 border-gray-300 rounded-lg flex w-4/5 @error('number_of_copies') is-invalid @enderror" name="number_of_copies ">
            <div>
                @error('number_of_copies')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="number_of_pages" class="p-2 text-xl flex grow">Pages</label>
            <input type="number" id="number_of_pages" class="border-2 border-gray-300 rounded-lg flex w-4/5 @error('number_of_pages') is-invalid @enderror" name="number_of_pages ">
            <div>
                @error('number_of_pages')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="publish_year" class="p-2 text-xl flex grow">Publish Year</label>
            <input type="date" id="publish_year" class="border-2 border-gray-300 rounded-lg flex w-4/5 @error('publish_year') is-invalid @enderror" name="publish_year ">
            <div>
                @error('publish_year')
                <span>
                    <strong class="text-red-600">{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-control flex flex-col md:flex-row items-center p-3">
            <label for="price" class="p-2 text-xl flex grow">Price</label>
            <input type="number" id="price" class="border-2 border-gray-300 rounded-lg flex w-4/5 @error('price') is-invalid @enderror" name="price ">
            <div>
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
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#cover-image-thumb')
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection


