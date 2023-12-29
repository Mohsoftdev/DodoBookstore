<x-app-layout>
<div class="container mx-auto p-10">
    <div class="flex justify-content-center w-full">
        <div class="mx-auto p-16 bg-white rounded-2xl">
            <div class="card">
                <div class="text-xl mb-5">Books authors</div>

                <div class="card-body">
                    <div class="justify-content-center h-10 w-70 mx-auto ">
                    <form action="{{ route('gallery.authors.search') }}" method="GET" class="flex border-4 border-blue-200 rounded-full bg-white h-full mx-auto items-center">
                    <input type="text" placeholder="Search..." class="border-0 rounded-full h-full focus:ring-0" name="term">
                    <button class="w-8 h-8 p-1.5 rounded-full bg-sky-600">
                        <i class='bx bx-search-alt-2 text-xl text-white'></i>
                    </button>
                </form>

                    </div>
                    <br>
                    <hr>
                    <br>



                    <h3 class="mb-4">{{ $title }}</h3>

                    <hr>
                    @if($authors->count())
                        <ul class="list-group p-5">
                            @foreach($authors as $category)
                                <a style="color:grey" href="{{ route('category.books', $category) }}">
                                    <li class="list-group-item">
                                        {{ $category->name }} ({{ $category->books->count() }})
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    @else
                        <div class="col-12 alert alert-info mt-4 mx-auto text-center">
                            No results are available for:
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
