@extends('theme.default')
@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

    tr {
        height: 50px;
    }

    .dataTables_length, .dataTables_filter, .dataTables_paginate, .dataTables_info{
        margin: 10px;
    }

    select{
        width: 60px;
    }

    input{
        border: 2px solid blue;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
        background: linear-gradient(to bottom, #6875f5, #00bcd4);
        color: white;
    }
</style>
@endsection

<!-- heading -->
@section('heading')
Books
@endsection

<!-- content -->

@section('content')
<a href="{{route('books.create')}}" class="bg-sidebar p-3 text-white font-bold rounded-xl flex items-center max-w-[120px]">
    <i class="bx bx-plus text-xl font-bold"></i>
    Add New
</a>
<div class="w-full mt-12">
    <div class="bg-white overflow-auto">
        <table id="books-table" class="">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ISBN</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Authors</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Publisher</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($books as $book)

                <tr class="">
                    <td class="text-left py-3 px-4"><a href="{{route('books.show', $book)}}">{{$book->title}}</a></td>
                    <td class="text-left py-3 px-4">{{$book->isbn}}</td>
                    <td class="text-left py-3 px-4"> {{$book->category != NULL ? $book->category->name : ""}}</td>
                    <td class="text-left py-3 px-4">
                        @if($book->authors()->count() > 0)
                        @foreach($book->authors as $author)
                        {{ $loop->first ? '' : 'and' }}
                        {{ $author->name }}
                        @endforeach
                        @endif
                    </td>
                    <td class="text-left py-3 px-4">{{$book->publisher != NULL ? $book->publisher->name : ""}}</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">${{$book->price != NULL ? $book->price : ""}}</td>
                    <td class="text-left py-3 px-4">
                        <a href="{{ route('admin.books.edit', $book)}}" class="font-bold p-2 bg-green-400 rounded-xl text-white m-1 h-8 w-20 flex items-center justify-center"><i class="bx bx-edit text-white"></i>Edit</a>
                        <form action="{{route('admin.books.destroy', $book)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="font-bold p-2 bg-red-400 rounded-xl text-white m-1 h-8 w-20 flex items-center justify-center"><i class="bx bx-trash">Delete</i></button>
                        </form>
                    </td>
                </tr>


                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#books-table').DataTable({
            // Add any customization options here
        });
    });
</script>
