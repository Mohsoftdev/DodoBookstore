<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    private $provider;
    function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
    }

    public function createPayment(Request $request){
        $data = json_decode($request->getContent(), true);

        $books = User::find($data['userId'])->booksInCart;
        $total = 0;

        foreach($books as $book){
            $total += $book->price * $book->pivot->number_of_copies;
        }

        $order = $this->provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => "USD",
                        'value' => $total
                    ],
                    'description' => 'Order Description'
                ]
            ],
        ]);

        return response()->json($order);
    }

    public function executePayment(Request $request) {

        $data = json_decode($request->getContent(), true);

        $result = $this->provider->capturePaymentOrder($data['orderId']);

        if($result['status'] === 'COMPLETED') {
            $user = User::find($data['userId']);
            $books = $user->booksInCart;
            $this->sendOrderConfirmationMail($books, auth()->user());

            foreach($books as $book) {
                $bookPrice = $book->price;
                $purchaseTime = Carbon::now();
                $user->booksInCart()->updateExistingPivot($book->id, ['bought' => TRUE, 'price' => $bookPrice, 'created_at' => $purchaseTime]);
                $book->save();
            }
        }
        return response()->json($result);
    }
}