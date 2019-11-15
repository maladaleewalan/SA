<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use App\Zone;
use App\Market;
use auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function createbookmarket($id) {
        if(Auth::user()->role == 'admin') {
            return redirect()->route('markets.index');
        }
        $zones = Zone::get();
        $market = Market::find($id);
        return view('books.create', ['zones'=>$zones , 'market'=> $market]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    public function storebookmarket(Request $request,$id) {
        $book = new Book;
        $book->user_id = Auth::user()->id;
        $book->market_id = $id;
        $book->bookingdate = date('Y-m-d');
        $book->selltype = $request->input('selltype');
        $book->zone_id = $request->input('zone');
        $book->amountblock = $request->input('num');

        $zone = Zone::find($book->zone_id);
        $total = 0;
        for($i = 0;$i<$book->amountblock;$i++) {
            if($book->zone_id == 1)  {//โซนหน้า 100 บาท
                $total += $zone->cost;
            }  
            else if($book->zone_id == 2) {
                $total += $zone->cost;
            }
        }

        $book->save();

        $book->pay = $total;

        $book->save();

        return redirect()->route('users.show',['user'=>Auth::user()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('users.show',['user'=>Auth::user()]);
    }
}
