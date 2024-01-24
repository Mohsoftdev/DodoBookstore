<x-app-layout>
    @section('head')
    <style>
        .StripeElement::placeholder {
            color: #aab7c4;


        }

        .card-box {
            border: 1px solid #9ca3af;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
    @endsection

    <div class="max-w-sm mx-auto mt-20 bg-white rounded-md shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-sidebar text-white">
            <h1 class="text-lg font-bold">Credit Card Payment</h1>
        </div>
        <form action="{{route('cart.purchase')}}" class="card-form" method="POST">
            @csrf
            <div class="px-6 py-4">
                <input type="hidden" name="payment_method" class="payment-method">

                <div class="mb-4">
                    <input class="card_holder_name StripeElement appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Cardholder Name" required>
                </div>

                <div>
                    <div id="card-element"></div>
                </div>

                <div id="card-errors" role="alert"></div>

                <div class="flex justify-between">
                    <div class="flex justify-start items-center">
                        <button class="pay bg-secondary-btn hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                            Pay Now
                        </button>
                        <span class="icon" hidden><i class="bx bx-sync bx-spin text-lg text-blue-300"></i></span>
                    </div>


                    <div>
                        <span class="border-b-2 border-gray-500 p-1">${{$total}}</span>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let stripe = Stripe("{{ env('STRIPE_KEY') }}")
        let elements = stripe.elements()
        let style = {

            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
        let card = elements.create('card', {
            style: style
        })
        card.mount('#card-element')
        $('#card-element').addClass('card-box')
        let paymentMethod = null
        $('.card-form').on('submit', function(e) {
            $('button.pay').attr('disabled', true)
            if (paymentMethod) {
                return true
            }
            stripe.confirmCardSetup(
                "{{ $intent->client_secret }}", {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: $('.card_holder_name').val()
                        }
                    }
                }
            ).then(function(result) {
                if (result.error) {
                    toastr.error('Incrediants you entered have some ')
                    $('button.pay').removeAttr('disabled')
                } else {
                    paymentMethod = result.setupIntent.payment_method
                    $('.payment-method').val(paymentMethod)
                    $('.card-form').submit()
                    $('span.icon').removeAttr('hidden');
                    $('button.pay').attr('disabled', true)
                    toastr.success('Purchased Successfully')
                }
            })

        })
    </script>

    @endsection
</x-app-layout>
