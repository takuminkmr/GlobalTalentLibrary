<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ApplyMeet;
use App\Models\GlobalTalent;
use App\Mail\ApplyMeetMail;
use App\Models\User;
use Mail;


class ApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $global_talent = GlobalTalent::find($id);
        $user = Auth::id();
        
        return view('apply', compact('global_talent', 'user'));
    }

    public function complete(Request $request)
    {
        $user = Auth::id();
        $gt = $request->input('apply_gt_id');

        $apply_meet = new ApplyMeet;
        
        $apply_meet->meet_option_day = $request->input('meet_option_day');
        $apply_meet->meet_way = $request->input('meet_way');
        $apply_meet->meet_purpose = $request->input('meet_purpose');
        $apply_meet->purpose_detail = $request->input('purpose_detail');
        $apply_meet->apply_member_id = $user;
        $apply_meet->apply_gt_id = $gt;
        $apply_meet->save();

        $global_talents = DB::table('global_talents')
        ->where('id', '=', $gt)
        ->select('gt_email', 'gt_name')
        ->first();
        
        $users = DB::table('users')
        ->where('id', '=', $user)
        ->select('entity_name')
        ->first();

        $way = $request->input('meet_way');
        if($way === "1"){
            $way = "ウェブで";
        }
        if($way === "2"){
            $way = "オフィスに招待して";
        }
        if($way === "3"){
            $way = "その他の方法で";
        }

        $purpose = $request->input('meet_purpose');
        if($purpose === "1"){
            $purpose = "社員として採用を検討";
        }
        if($purpose === "2"){
            $purpose = "インターンシップのお誘い";
        }
        if($purpose === "3"){
            $purpose = "交流を図るためのカジュアル面談";
        }
        if($purpose === "4"){
            $purpose = "その他";
        }

        $data = [
            "email" => $global_talents->gt_email,
            "name" => $global_talents->gt_name,
            "meet_option_day" => $request->input('meet_option_day'),
            "meet_way" => $way,
            "meet_purpose" => $purpose,
            "purpose_detail" => $request->input('purpose_detail'),
            "entity_name" => $users->entity_name,
        ];

        Mail::send('mail.invite', compact('data'), function($message) use($global_talents) {
            $message
            ->to($global_talents->gt_email)
            ->from('career-advisor@sociarise.co.jp', 'Sociarise Career Advisor')
            ->subject('企業より面会のお誘いがありました！')
            ->bcc('career-advisor@sociarise.co.jp');
        });

        return view('complete');
    }
}