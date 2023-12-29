@extends('theme.default')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:overflow-x overflow-x-auto">
    <div class="h-36 w-64  bg-white rounded-xl border-r-4 border-blue-500 mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
        <div class="flex flex-col">
            <span class="text-xl font-bold text-blue-500 mb-2 mx-auto">{{$number_of_books}}</span>
            <h1 class="text-2xl">Books</h2>
        </div>
        <i class='bx bx-book-open text-5xl text-gray-500'></i>
    </div>
    <div class="w-64 h-36  bg-white rounded-xl border-r-4 border-red-500 mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
        <div class="flex flex-col">
            <span class="text-xl font-bold text-red-500 mb-2 mx-auto">{{$number_of_categories}}</span>
            <h1 class="text-xl">Categories</h2>
        </div>
        <i class="bx bx-list-ul text-5xl text-gray-500"></i>
    </div>
    <div class="w-64  h-36  bg-white rounded-xl border-r-4 border-green-500  mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
        <div class="flex flex-col">
            <span class="text-xl font-bold text-green-500 mb-2 mx-auto">{{$number_of_publishers}}</span>
            <h1 class="text-2xl">Publishers</h2>
        </div>
        <i class="bx bx-table text-5xl text-gray-500"></i>
    </div>
    <div class="w-64 h-36  bg-white rounded-xl border-r-4 border-yellow-500  mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
        <div class="flex flex-col">
            <span class="text-xl font-bold text-yellow-500 mb-2 mx-auto">{{$number_of_authors}}</span>
            <h1 class="text-2xl me">Authors</h2>
        </div>
        <i class="bx bx-pen text-5xl text-gray-500"></i>
    </div>
</div>


@endsection
