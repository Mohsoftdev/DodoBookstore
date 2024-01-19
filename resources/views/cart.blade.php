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
            <div id="success" style="display: none;" class="bg-green-500 p-3 rounded-lg mb-4 w-2/5 m-auto text-white">{{__('The Payment Process Completed Successfully')}}</div>
            <div class="mx-auto max-w-5xl justify-between px-6 md:flex md:space-x-6 xl:px-0 flex-row">
                <div class="card w-2/3">
                    @php($totalPrice = 0)
                    @foreach($books as $book)
                    @php($totalPrice += $book->price * $book->pivot->number_of_copies)
                    <div class="rounded-lg md:w-full">
                        <div class="justify-between mb-6 rounded-lg bg-white p-5 shadow-md sm:flex sm:justify-center sm:text-center md:max-h-42">
                            <img src="{{ asset('storage/' . $book->cover_image)}}" alt="book-image" class="w-full rounded-lg sm:w-40 md:h-36" />
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">{{ $book->title }}</h2>
                                    <p class="mt-1 text-lg text-blue-700 text-start">{{ $book->price }} $</p>
                                </div>
                                <div class="mt-4 flex justify-center sm:space-y-6 sm:mt-0 flex-col sm:space-x-6">
                                    <div class="flex justify-center border-gray-100">
                                        <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="{{$book->pivot->number_of_copies}}" min="1" />
                                    </div>
                                    <div class="flex justify-center space-x-4 mt-3">
                                        <p class="text-sm">Total: ${{ $book->price * $book->pivot->number_of_copies}}</p>
                                        <form action="{{route('cart.removeOne', $book->id)}}" method="POST">
                                            @csrf
                                            <button type="submit"><i class="bx bx-trash text-red-500"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Sub total -->
                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">Subtotal</p>
                        <p class="text-gray-700">${{$totalPrice}}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-700">Shipping</p>
                        <p class="text-gray-700">${{$books->count() * 1.99}}</p>
                    </div>
                    <hr class="my-4" />
                    <div class="flex justify-between mb-5">
                        <p class="text-lg font-bold">Total</p>
                        <div class="">
                            <p class="mb-1 text-lg font-bold">${{$totalPrice + $books->count() * 1.99 + ($totalPrice + $books->count() * 1.99) * 0.05}}</p>
                            <p class="text-sm text-gray-700">including VAT</p>
                        </div>
                    </div>
                    <div class="d-inline-block" id="paypal-button-container"></div>
                    <!-- <a href="#" class="d-inline-block mb-4 float-start btn bg-cart" style="text-decoration:none;">
                        <span>بطاقة ائتمانية</span>
                        <i class="fas fa-credit-card"></i>
                    </a> -->
                </div>
            </div>
        </div>

        @section('script')

        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=AQRWbMAWt343SepNyor-YpDs4my0osewxk53gEf13osU9YwHSJk7Pqxd_Wy1vH-zICZtOrYS3Dz6jF4R&currency=USD"></script>

        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return fetch('/api/paypal/create-payment', {
                        method: 'POST',
                        body: JSON.stringify({
                            'userId': "{{auth()->user()->id}}",
                        })
                    }).then(function(res) {
                        return res.json();
                    }).then(function(orderData) {
                        return orderData.id;
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return fetch('/api/paypal/execute-payment', {
                        method: 'POST',
                        body: JSON.stringify({
                            orderId: data.orderID,
                            userId: "{{ auth()->user()->id }}",
                        })
                    }).then(function(res) {
                        return res.json();
                    }).then(function(orderData) {
                        $('#success').slideDown(200);
                        $('.card').slideUp(0);
                    });
                }
            }).render('#paypal-button-container');
        </script>

        @endsection
    </body>
</x-app-layout>
