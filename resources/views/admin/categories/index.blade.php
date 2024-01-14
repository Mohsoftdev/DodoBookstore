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
Categories
@endsection

<!-- content -->

@section('content')
<a href="{{route('admin.categories.create')}}" class="bg-sidebar p-3 text-white font-bold rounded-xl flex items-center max-w-[120px]">
    <i class="bx bx-plus text-xl font-bold"></i>
    Add New
</a>
<div class="w-2/3 mt-12 mx-auto">
    <div class="bg-white overflow-auto">
        <table id="books-table" class="">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($categories as $category)
                <tr class="">
                    <td class="text-left py-2 px-4"><a href="#">{{$category->name}}</a></td>
                    <td class="text-left py-2 px-4">{{$category->description}}</td>
                    <td class="flex text-left py-2 px-4">
                        <a href="{{ route('admin.categories.edit', $category)}}" class="font-bold p-2 bg-green-500 rounded-xl text-white m-1 h-8 w-20 flex items-center justify-center"><i class="bx bx-edit text-white"></i>Edit</a>
                        <form action="{{route('admin.categories.destroy', $category)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="font-bold p-2 bg-red-500 rounded-xl text-white m-1 h-8 w-20 flex items-center justify-center"><i class="bx bx-trash">Delete</i></button>
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
