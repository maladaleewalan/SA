<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;

class MarketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Market::get();
        return view('markets.index',['markets'=>$markets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('markets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $this->validate($request,[
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'datesale' => 'required',
            'startbooking' => 'required',
            'endbooking' => 'required',
        ]);

        $market = new Market;

        $ext = pathinfo(basename($_FILES['picture']['name']),PATHINFO_EXTENSION);   //ดึงนามสกุลจากไฟล์ที่โหลดมา
        $new_image_name = 'img_'. uniqid() . "." . $ext;    //สุ่มชื่อไฟล์ใหม่ เป็นสตริงไม่ซ้ำ
        $image_path = "image/";      //folder image
        $upload_path = $image_path . $new_image_name;
        //uploading
        $success = move_uploaded_file($_FILES['picture']['tmp_name'],$upload_path);  //เอามาใส่ในupload path

        //เพิ่มชื่อรูปภาพใหม่ลงฐานข้อมูล
        $market->picture =  $new_image_name;

        $market->datesale = $validateData['datesale'];
        $market->startbooking = $validateData['startbooking'];
        $market->endbooking = $validateData['endbooking'];
        $market->save();

        return redirect()->route('markets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        //
    }
}
