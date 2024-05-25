<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Crud;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $modalDataSave = new Crud();
        $showlist = $modalDataSave->showList();
        
        return view('home',['show_details' => $showlist]);
    }
}
