@extends('theme.default')
@section('heading')
Dashboard
@endsection
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:overflow-x overflow-x-auto">
    <a href="{{route('admin.books.index')}}">
        <div class="transition ease-in-out hover:-translate-y-2  hover:-translate-x-2 h-36 w-64  bg-white rounded-xl border-r-4 border-blue-500 mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
            <div class="flex flex-col">
                <span class="text-xl font-bold text-blue-500 mb-2 mx-auto">{{$number_of_books}}</span>
                <h1 class="text-2xl">Books</h2>
            </div>
            <i class='bx bx-book-open text-5xl text-blue-500'></i>
        </div>
    </a>
    <a href="{{route('admin.categories.index')}}">
        <div class="transition ease-in-out hover:-translate-y-2  hover:-translate-x-2 w-64 h-36  bg-white rounded-xl border-r-4 border-red-500 mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
            <div class="flex flex-col">
                <span class="text-xl font-bold text-red-500 mb-2 mx-auto">{{$number_of_categories}}</span>
                <h1 class="text-2xl">Categories</h2>
            </div>
            <i class="bx bx-list-ul text-5xl text-red-500"></i>
        </div>
    </a>

    <a href="{{route('admin.publishers.index')}}">
        <div class="transition ease-in-out hover:-translate-y-2  hover:-translate-x-2 w-64  h-36  bg-white rounded-xl border-r-4 border-green-500  mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
            <div class="flex flex-col">
                <span class="text-xl font-bold text-green-500 mb-2 mx-auto">{{$number_of_publishers}}</span>
                <h1 class="text-2xl">Publishers</h2>
            </div>
            <i class="bx bx-table text-5xl text-green-500"></i>
        </div>
    </a>
    <div class="transition ease-in-out hover:-translate-y-2  hover:-translate-x-2 w-64 h-36  bg-white rounded-xl border-r-4 border-yellow-500  mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
        <div class="flex flex-col">
            <span class="text-xl font-bold text-yellow-500 mb-2 mx-auto">{{$number_of_authors}}</span>
            <h1 class="text-2xl me">Authors</h2>
        </div>
        <i class="bx bx-pen text-5xl text-yellow-500"></i>
    </div>

    <a href="{{route('admin.users.index')}}">
        <div class="transition ease-in-out hover:-translate-y-2  hover:-translate-x-2 w-64 h-36  bg-white rounded-xl border-r-4 border-orange-500  mx-auto md:me-6 mb-5 p-6 flex flex-row items-center justify-between">
            <div class="flex flex-col">
                <span class="text-xl font-bold text-orange-500 mb-2 mx-auto">{{$number_of_users}}</span>
                <h1 class="text-2xl me">Users</h2>
            </div>
            <i class="bx bxs-user text-5xl text-orange-500"></i>
        </div>
    </a>
</div>

<div class="flex flex-wrap mt-6">
    <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
        <p class="text-xl pb-3 flex items-center">
            <i class="bx bx-plus font-bold text-2xl"></i> Yearly Report
        </p>
        <div class="p-6 bg-white">
            <canvas id="chartOne" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
        <p class="text-xl pb-3 flex items-center">
            <i class='bx bx-check text-2xl'></i> Monthly Reports
        </p>
        <div class="p-6 bg-white">
            <canvas id="chartTwo" width="400" height="200"></canvas>
        </div>
    </div>
</div>
@endsection
