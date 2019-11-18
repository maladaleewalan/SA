<?php

namespace App\Http\Controllers;

use App\Block;
use Illuminate\Http\Request;

use App\Book;
use App\Market;
use auth;
class BlocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role != "admin") {
            return redirect()->route('home');
        }
        $markets = Market::orderBy('created_at','desc')->get();
        $books = Book::get();
        $blocks = Block::orderBy('name','asc')->get();
        return view('blocks.index',['markets'=>$markets, 'books'=>$books,'blocks'=>$blocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createforbook(request $request,$id) {
        $validateData = $this->validate($request,[
            'block' => ['required','max:5']
        ]);
        $book = Book::find($id);
        $block = new block;
        $block->book_id = $id;
        $block->name = $validateData['block'];
        $block->save();
        return redirect()->route('bills.indexeachmarket',['id'=>$book->market_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit(Block $block)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Block $block)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        //
    }
}
