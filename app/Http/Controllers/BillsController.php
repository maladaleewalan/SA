<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;

use auth;
use App\Book;

class BillsController extends Controller
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
        
    }

    public function indexeachmarket($id) {
        $books = Book::where('market_id',$id)->get();
   
        $bills = Bill::get();
        if(Auth::user()->role != "admin") {
            return redirect()->route('home');
        }


        return view('bills.index',['bills'=>$bills,'marketid'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('bills.create');
    }

    public function createbillforbook($id)
    {
        $book = Book::find($id);
        if(Auth::user()->role == "admin" || $book->user->id != Auth::id()) {
            return redirect()->route('home');
        }
        $book = Book::find($id);
        $banks = ["ธนาคารกรุงศรีอยุธยา","ธนาคารกรุงเทพ","ธนาคารกรุงไทย","ธนาคารกสิกรไทย","ธนาคารเกียรตินาคิน","ธนาคารซิตี้แบงค์","ธนาคารซีไอเอ็มบี","ธนาคารทหารไทย","ธนาคารทิสโก้","ธนาคารไทยพาณิชย์","ธนาคารธนชาติ","ธนาคารเพื่อการเกษตรและสหกรณ์","ธนาคารแลนด์แอนด์เฮ้าส์","ธนาคารออมสิน","ธนาคารอาคารสงเคราะห์"];
        return view('bills.create' , ['book'=> $book,'banks'=>$banks]);
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

    public function storebillforbook(Request $request,$id)
    {
        $validateData = $this->validate($request,[
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'bankaccount' => ['required','min:7','max:20'],
        ]);

        $bill = new Bill;

        $ext = pathinfo(basename($_FILES['picture']['name']),PATHINFO_EXTENSION);   //ดึงนามสกุลจากไฟล์ที่โหลดมา
        $new_image_name = 'img_'. uniqid() . "." . $ext;    //สุ่มชื่อไฟล์ใหม่ เป็นสตริงไม่ซ้ำ
        $image_path = "image/";      //folder image
        $upload_path = $image_path . $new_image_name;
        //uploading
        $success = move_uploaded_file($_FILES['picture']['tmp_name'],$upload_path);  //เอามาใส่ในupload path

        //เพิ่มชื่อรูปภาพใหม่ลงฐานข้อมูล

        $bill->book_id = $id;
        $bill->picture =  $new_image_name;
        $bill->datebill = date('Y-m-d');
        $bill->bank =  $request->input('bank');
        $bill->bankaccount = $validateData['bankaccount'];
        $bill->save();

        $book = Book::find($id);
        $book->status = "1";
        $book->save();
        

        return redirect()->route('users.show',['user'=>Auth::user()]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
