<x-app-layout>
    <!-- component -->
    <!-- Create By Joker Banny -->
    <style>
        @layer utilities {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>

    <body>
        <div class="bg-gray-100 pt-20 text-center">
            <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
            <div class="mx-auto max-w-5xl justify-between px-6 md:flex md:space-x-6 xl:px-0 flex-row">
                <div class="card">
                    @php($totalPrice = 0)
                    @foreach($purchasedBooks as $book)
                    @php($totalPrice += $book->price * $book->pivot->number_of_copies)
                    <!-- component -->
                    <div class="flex flex-col justify-between mb-3">
                        <div class="relative flex flex-col md:flex-row md:space-x-5 space-y-3  rounded-xl shadow-lg p-3 w-[250px] md:w-[770px] mx-auto border border-white bg-white md:h-[250px] items-center">
                            <div class="w-full md:w-1/4 bg-white grid place-items-start">
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="tailwind logo" class="rounded-xl h-41 w-full cover" />
                            </div>
                            <div class="w-full md:w-2/3 bg-white flex flex-col p-1 h-full">
                                <div class="flex justify-between item-center mb-2">
                                    <p class="text-gray-500 font-medium hidden md:block">{{$book->category->name}}</p>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <p class="text-gray-600 font-bold text-sm ml-1">
                                            4.96
                                            <span class="text-gray-500 font-normal">(76 reviews)</span>
                                        </p>
                                    </div>
                                    <!-- <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                        </svg>
                                    </div> -->
                                    <div class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block">
                                        {{$book->pivot->created_at->diffForhumans()}}</div>
                                </div>
                                <div class="flex grow">
                                <h3 class="font-black text-gray-800 md:text-2xl text-xl text-start flex grow">{{$book->title}}</h3>
                                </div>
                                <p class="md:text-lg text-gray-500 text-base"></p>
                                <div class="md:text-xl font-black text-gray-800 flex justify-between m-3 items-center">
                                    <span>Purchased: {{ $book->pivot->number_of_copies }}</span>
                                    <span class="font-normal text-white rounded-lg text-base bg-sidebar p-2"> <span class="hidden md:inline-block">Total: </span> ${{$book->price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>

    </body>
</x-app-layout>
