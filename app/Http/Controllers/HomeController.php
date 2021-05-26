<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['thanks']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $new_faces = DB::table('global_talents')->latest()->limit(3)->get();
        $global_talent_names = DB::table('global_talents')->orderBy('gt_name', 'desc')->get();
        // $global_talent_introductions = DB::table('global_talents')->orderBy('introduction', 'desc')->limit(6)->get();

        return view('home', compact('new_faces', 'global_talent_names'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function thanks()
    {   
        return view('thanks');
    }
}
