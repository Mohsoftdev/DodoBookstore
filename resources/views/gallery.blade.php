<x-app-layout>
    <!-- This is an example component -->
    <div class="">
        <!-- Search Label -->
        <div class="container pt-5">
            <div class="flex flex-row content-center">
                <form action="/search" class="flex border-4 border-blue-200 rounded-full bg-white h-full mx-auto p-1 items-center">
                    <input type="text" placeholder="Search..." class="border-0 rounded-full h-full focus:ring-0" name="term">
                    <button class="w-12 h-12 p-3 rounded-full bg-sky-600">
                        <i class='bx bx-search-alt-2 text-2xl text-white'></i>
                    </button>
                </form>
                
            </div>
        </div>

        <h3 class="my-3 mx-6 text-xl font-bold border-b-4 p-3">{{$title}}</h3>

    </div>

    <!-- Gallery View -->
    <div class="mt-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-items-center md:gap-4">
            @if($books->count())
                @foreach($books as $book)
                    @if($book->number_of_copies > 0)

                    <div class="transition ease-in-out hover:-translate-y-2 flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-80 mb-6">
                        <a href="{{route('book.details', $book)}}">
                            <div class=" border-4 border-blue-200 relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-80">
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="card-image" class="object-cover w-full h-full" />
                            </div>
                        </a>
                        <div class="p-6">
                            <div class="flex items-center justify-content-between mb-2">
                                <div class="flex grow flex-col">
                                    <h6 class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{$book->title}}
                                    </h6>
                                    <a class="flex  text-sm leading-relaxed text-sky-300 text-sm" href="{{route('category.books', $book->category)}}">
                                        @if ($book->category != NULL)
                                        {{ $book->category->name }}
                                        @endif
                                    </a>
                                </div>

                                <div class="flex font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                    ${{$book->price}}
                                </div>
                            </div>
                            <p class="line-clamp-3 font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                                ${{$book->description}}
                            </p>
                        </div>

                    </div>

                    @endif
                @endforeach
            @else
            <div class="bg-sky-600 text-white font-bold text-center p-5 rounded-xl">No Result available for this search</div>
            @endif
        </div>

    </div>
</x-app-layout>
