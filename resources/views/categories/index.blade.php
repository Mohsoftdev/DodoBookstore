<x-app-layout>
     <!-- This is an example component -->
     <div class="container mx-auto">




<div class="container pt-5">
    <div class="flex flex-row content-center">
        <form action="/search" class="flex border-2 rounded-full bg-white h-full mx-auto p-1 items-center">
            <input type="text" placeholder="Search..." class="border-0 rounded-full h-full focus:outline-none" name="term">
            <button class="w-12 h-12 p-3 rounded-full bg-sky-600">
                <i class='bx bx-search-alt-2 text-2xl text-white'></i>
            </button>
        </form>
    </div>

</div>

</div>


<div class="mt-8 mb-8 mx-auto">
<div class="grid md:grid-cols-4 justify-items-center md:gap-4">
@if($categories->count())
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <a style="color:grey" href="{{ route('category.books', $category) }}">
                                    <li class="list-group-item">
                                        {{ $category->name }} ({{ $category->books->count() }})
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    @else
                        <div class="col-12 alert alert-info mt-4 mx-auto text-center">
                            لا نتائج
                        </div>
                    @endif
</div>

</div>
</x-app-layout>
