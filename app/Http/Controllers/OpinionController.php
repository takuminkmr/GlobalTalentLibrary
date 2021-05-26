<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Opinion;

class OpinionController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth')->except(['add']);
    }
    
    public function index() {
        $todoOpinions = DB::table('opinions')->where('todo', '=', '1')
        ->orderBy("id", "desc")
        ->get();

        $doneOpinions = DB::table('opinions')->where('todo', '=', '0')
        ->orderBy("id", "desc")
        ->get();

        return view('opinion', compact('todoOpinions', 'doneOpinions'));
        
    }

    public function add(Request $request) {
        $opinions = new Opinion;

        $request->validate([
            'photo' => 'file|image|mimes:png,jpeg'
        ]);

        $upload_photo = $request->file('photo');

        if($upload_photo) {
			$path = $upload_photo->store('todos',"public");
            if($path){
                $opinions->photo = $path;
			}
		}

        $opinions->url = $request->input('url');
        $opinions->opinion = $request->input('opinion');
        $opinions->todo = $request->input('todo');
        $opinions->save();

        return redirect($opinions->url);
    }

    public function todo(Request $request) {
        $id = $request->input('id');
        $opinions = Opinion::find($id);
        $opinions->todo = $request->input('todo');
        $opinions->save();

        return redirect('opinion');
    }

    // public function delete(Request $request)
    // {
    //     $id = $request->input('id');
    //     $opinions = Opinion::find($id);
    //     $opinions->delete();

    //     return redirect('opinion');
    // }
}