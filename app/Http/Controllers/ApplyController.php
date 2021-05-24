<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplyMeet;
use App\Models\GlobalTalent;
use App\User;

class ApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $global_talent = GlobalTalent::find($id);
        //$user = User::find($id);
        $user = Auth::id();
        
        return view('apply', compact('global_talent', 'user'));
    }

    public function complete(Request $request)
    {
        $user = Auth::id();

        $apply_meet = new ApplyMeet;
        
        $apply_meet->meet_option_day = $request->input('meet_option_day');
        $apply_meet->meet_way = $request->input('meet_way');
        $apply_meet->meet_purpose = $request->input('meet_purpose');
        $apply_meet->purpose_detail = $request->input('purpose_detail');
        $apply_meet->apply_member_id = $user;
        $apply_meet->apply_gt_id = $request->input('apply_gt_id');

        $apply_meet->save();

        return view('complete');
    }
}
