<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\GlobalTalent;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id)
    {
        $global_talent = GlobalTalent::find($id); //"10"
        $memberId = Auth::id(); //2
        
        $interest = DB::table('interests')
        ->where('interest_gt_id', '=', $id)
        ->where('interest_member_id', '=', $memberId)
        ->select('interests.*')
        ->get();

        // try {
        //     $id_type = User::findOrFail ( $value, [
        //         'account_type'
        //     ] );
        //   } catch ( \Exception $e ) {
        //     // idが見つからない場合
        //     return $fail ( '士業アカウントではありません' );
        // }

        return view('detail', compact('global_talent', 'memberId', 'interest'));
    }
}
