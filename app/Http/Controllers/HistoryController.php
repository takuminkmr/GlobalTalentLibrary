<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $id = Auth::id();
        $apply_meets = DB::table('apply_meets')->where('apply_member_id', '=', $id)
        ->join('global_talents', 'apply_meets.apply_gt_id', '=', 'global_talents.id')
        ->select('apply_meets.*', 'global_talents.*')
        ->get();
        
        foreach($apply_meets as $apply_meet) {
            $meet_way = $apply_meet->meet_way;
            $meet_purpose = $apply_meet->meet_purpose;
        }

        if(!isset($meet_way)) {
            $meet_way = '';
        }
        if($meet_way === 1) {
            $meet_way = 'ウェブで';
        }
        if($meet_way === 2) {
            $meet_way = 'オフィスに招待して';
        }
        if($meet_way === 3) {
            $meet_way = 'その他の方法で';
        }

        if(!isset($meet_purpose)) {
            $meet_purpose = '';
        }
        if($meet_purpose === 1) {
            $meet_purpose = '社員として採用を検討';
        }
        if($meet_purpose === 2) {
            $meet_purpose = 'インターンシップ';
        }
        if($meet_purpose === 3) {
            $meet_purpose = '交流を図るためのカジュアル面談';
        }
        if($meet_purpose === 4) {
            $meet_purpose = 'その他';
        }

        return view('history', compact('id', 'apply_meets', 'meet_way', 'meet_purpose'));
    }
}