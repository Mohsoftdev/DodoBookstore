<x-app-layout>

        <table class="shadow-md bg-clip-border border-collapse border border-gray-500 table-auto mx-auto bg-white mt-10 mb-10">
            <div class="flex">
            <tr class="p-10 h-16">
            <th class="bg-sidebar text-2xl text-white">Book Details</th>
                <td class="bg-sidebar"></td>
            </tr>
            <tr class="p-10 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">Title</th>
                <td class="w-80 border-collapse border border-gray-500 p-5">{{$book->title}}</td>
            </tr>

            <tr class="p-10 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">ISBN</th>
                <td class="w-80 border-collapse border border-gray-500 p-5">{{$book->isbn}}</td>
            </tr>
            <tr class="p-5 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">Book Cover</th>
                <td class="w-80 border-collapse border border-gray-500 p-5"><img src="{{asset('storage/' .$book->cover_image)}}" alt="$book->name . cover_image"></td>
            </tr>
            <tr class="p-5 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">Category</th>
                <td class="w-80 border-collapse border border-gray-500 p-5"><a href="{{route('category.books', $book->category)}}">{{$book->category->name}}</a></td>
            </tr>

            <tr class="p-5 h-16 border-bottom-3">
                <th class="border-collapse border border-gray-500 text-blue-300 w-80">Authors</th>
                <td class="w-80 border-collapse border border-gray-500 p-5">
                    @foreach ($book->authors as $author)

                        {{ $author->name }}
                    @endforeach
                </td>
            </tr>
            <tr class="p-5 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">Publisher</th>
                <td class="w-80 border-collapse border border-gray-500 p-5">{{$book->publisher->name}}</td>
            </tr>
            <tr class="p-5 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">Description</th>
                <td class="w-80 border-collapse border border-gray-500 p-5">{{$book->description}}</td>
            </tr>
            <tr class="p-5 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">Number of Pages</th>
                <td class="w-80 border-collapse border border-gray-500 p-5">{{$book->number_of_pages}}</td>
            </tr>
            <tr class="p-5 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">Available Number of Copies</th>
                <td class="w-80 border-collapse border border-gray-500 p-5">{{$book->number_of_copies}}</td>
            </tr>
            <tr class="p-5 h-16">
                <th class="border-collapse border border-gray-500 text-blue-300">Price</th>
                <td class="w-80 border-collapse border border-gray-500 p-5">${{$book->price}}</td>
            </tr>
            </div>

        </table>

</x-app-layout>
