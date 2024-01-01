@extends('theme.default')
@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
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
        <table id="books-table" class="min-w-full bg-white border-2">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="w-2/9 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                    <th class="w-2/9 text-left py-3 px-4 uppercase font-semibold text-sm">ISBN</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Authors</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Publisher</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($books as $book)

                    <tr>
                        <td class="w-2/9 text-left py-3 px-4"><a href="/books/{{$book->id}}">{{$book->title}}</a></td>
                        <td class="w-2/9 text-left py-3 px-4">{{$book->isbn}}</td>
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
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">${{$book->price != NULL ? $book->price : ""}}</td>
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
