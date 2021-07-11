<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Interest;

class InterestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $id = Auth::id();
        
        $interests = DB::table('interests')
        ->where('interest_member_id', '=', $id)
        ->join('global_talents', 'interests.interest_gt_id', '=', 'global_talents.id')
        ->select('global_talents.*')
        ->get();
        
        return view('interest', compact('interests'));
    }

    public function add(Request $request)
    {
        $user = Auth::id();
        $form = $request->all();

        // $_POST["from"] = "add";

        $interest = new Interest;
        
        $interest->interest_member_id = $user;
        $interest->interest_gt_id = $request->input('interest_gt_id');
        
        $interest->save();

        return redirect()->route('detail', ['id' => $interest->interest_gt_id]);
    }

    public function destroy(Request $request)
    {
        $id = Auth::id();
        $removeId = $request->input('interest_gt_id');

        $interest = DB::table('interests')
        ->where([
            ['interest_member_id', '=', $id],
            ['interest_gt_id', '=', $removeId],
        ])
        ->delete();

        return redirect()->route('interest', ['id' => $id]);
    }
}
