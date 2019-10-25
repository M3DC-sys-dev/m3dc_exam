<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function __construct()
    {
        // データ記入ミドルウェアはデータを受けるviewpageのみ有効化になります
        $this->middleware('seminarInputToLog')->only('displayview');
        $this->middleware('seminarInputToDB')->only('displayview');
    }

    public function index()
    {
        return view('viewpages.input');
    }
    
    public function displayview(Request $request)
    {
        return view('viewpages.viewpage');
    }
}
