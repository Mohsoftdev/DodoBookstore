<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request)
    {
        $book = Book::find($request->id);

        if(auth()->user()->booksInCart->contains($book)) {
            $newQuantity = $request->quantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
            if($newQuantity > $book->number_of_copies) {
                session()->flash('warning_message',  'Book was not added the maximum addable number of copies is' . ($book->number_of_copies - auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies) . ' Book');
                return redirect()->back();
            } else {
                auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies'=> $newQuantity]);
            }

        } else {
            auth()->user()->booksInCart()->attach($request->id, ['number_of_copies'=> $request->quantity]);
        }

        $num_of_product = auth()->user()->booksInCart()->count();

        return response()->json(['num_of_product' => $num_of_product]);
    }

}
