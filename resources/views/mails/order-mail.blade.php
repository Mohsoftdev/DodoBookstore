<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @livewireStyles
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
        }

        .bg-sidebar {
            background: linear-gradient(to bottom, #6875f5, #00bcd4);
        }

        .bg-cart {
            background: #f2ba36;
        }

        .bg-secondary-btn{
            background: #00bcd4;
        }
    </style>
</head>

<body>
    <div class="relative col-span-full flex flex-col py-6 pl-8 pr-4 sm:py-12 lg:col-span-4 lg:py-24">
    <div class="flex items-center grow">
                    <div class="">
                        <x-responsive-nav-link href="{{ route('Home_Page') }}" :active="request()->routeIs('dashboard')" class="flex items-center">

                            <x-logo />

                            {{ __('DoDoBookstore') }}
                        </x-responsive-nav-link>
                    </div>
                </div>
        <h2 class="font-bold border-b-2 p-2 m-2">Order summary</h2>
        <div class="p-4">
            <p>Dear <b>{{ $user->name }}</b></p>
            <div>
            Thanks for your purchase from our store. This is a confirmation email for your purchase. Please
            view your order details. If there is not problem please do not hesitate to contact us at our Customer
            service number
            </div>
        </div>
        <div>
            <img src="{{asset('storage/images/Bookstore_background.jpg')}}" alt="" class="absolute left-0 h-full w-full object-cover" />
            <div class="absolute left-0 h-full w-full bg-sidebar opacity-95"></div>
        </div>
        <div class="relative p-3">
            <ul class="space-y-5 border-b-2">
                @php
                ($subtotal = 0)
                @endphp

                @foreach($order as $product)
                <li class="flex justify-between">
                    <div class="inline-flex grow max-h-16">
                        <img src="{{ asset('storage/' . $product->cover_image)}}" alt="book-image" class="rounded-lg w-16 h-20" />
                        <div class="ml-3">
                            <p class="text-base font-semibold text-white">{{ $product->title }}</p>
                            <p class="text-sm font-medium text-white text-opacity-80">{{ $product->author }}</p>
                        </div>
                    </div>
                    <div class="text-white font-bold flex grow justify-center">
                        <i class='bx bx-x me-2'></i>
                        {{$product->pivot->number_of_copies}}
                    </div>
                    <p class="text-sm font-semibold text-white flex grow justify-end">${{$product->price * $product->pivot->number_of_copies}}</p>
                </li>
                @php
                ($subtotal += $product->price * $product->pivot->number_of_copies)
                @endphp
                @endforeach
            </ul>
            <div class="my-5 h-0.5 w-full bg-white bg-opacity-30"></div>
            <div class="space-y-2">
                <p class="flex justify-between text-lg font-bold text-white"><span>Total price:</span><span>${{$subtotal}}</span></p>
                <p class="flex justify-between text-sm font-medium text-white"><span>Vat: 10%</span><span>${{$subtotal * 0.1 }}</span></p>
            </div>
        </div>
        <div class="relative mt-10 text-white">
            <h3 class="mb-5 text-lg font-bold">Customer Service</h3>
            <p class="text-sm font-semibold">+0971 555555 555 <span class="font-light">(International)</span></p>
            <p class="mt-1 text-sm font-semibold">support@dodobookstore.com <span class="font-light">(Email)</span></p>
            <p class="mt-2 text-xs font-medium">Call us now for payment related issues</p>
        </div>
        <div class="relative mt-10 flex">
            <p class="flex flex-col"><span class="text-sm font-bold text-white">Money Back Guarantee</span><span class="text-xs font-medium text-white">within 30 days of purchase</span></p>
        </div>
    </div>
</body>

</html>
