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

    .dataTables_length,
    .dataTables_filter,
    .dataTables_paginate,
    .dataTables_info {
        margin: 10px;
    }

    select {
        width: 60px;
    }

    input {
        border: 2px solid blue;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
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
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Role</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($users as $user)

                <tr class="">
                    <td class="text-left py-3 px-4">{{$user->name}}</td>
                    <td class="text-left py-3 px-4">{{$user->email}}</td>
                    <td class="">
                        <form class="ml-4 form-inline" method="POST" action="{{ route('users.update', $user) }}" style="display: flex">
                            @method('patch')
                            @csrf
                            <select class="form-control form-control-sm" name="adminstartion_level" style="flex-grow : 1;" class="justify-center">
                                <option selected disabled>{{ $user->isSuperAdmin() ? 'Super Admin' : ($user->isAdmin() ? 'Admin' : 'User') }}</option>
                                <option value="0">user</option>
                                <option value="1">admin</option>
                                <option value="2">super admin</option>
                            </select>
                            <button type="submit" class="font-bold p-2 bg-green-500 rounded-xl text-white m-1 h-8 w-20 flex items-center justify-center">Submit</a>
                        </form>
                    </td>
                    <td class="text-center py-3 px-4">

                        <form action="{{route('admin.users.destroy', $user)}}" method="post" class="justify-content-center">
                            @method('delete')
                            @csrf
                            <button class="font-bold p-2 bg-red-400 rounded-xl text-white m-1 h-8 w-20 flex items-center justify-center" onclick="return cofirm('are you sure?')"><i class="bx bx-trash">Delete</i></button>
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
