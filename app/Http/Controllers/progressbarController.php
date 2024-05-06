<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Modals\progressbar;

class progressbarController extends Controller
{
    //
    public function index()
    {
        return view('upload');
    }
    public function store()
    {
        $title = "Someone name"

        time().'.'.$ewquest()->file-> getClientOringinalExtension();

        $request->file->move(public_path('upload'))
    }
}