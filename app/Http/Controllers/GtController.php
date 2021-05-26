<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GlobalTalent;

class GtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $global_talents = GlobalTalent::orderBy("id", "desc")->get();

        return view('gt.index', compact('global_talents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $global_talent = new GlobalTalent;
        
        $request->validate([
            'photo' => 'required|file|image|mimes:png,jpeg'
        ]);

        $upload_photo = $request->file('photo');

        if($upload_photo) {
			//アップロードされた画像を保存する
			$path = $upload_photo->store('uploads',"public");
			//画像の保存に成功したら登録用の変数に代入する
			if($path){
                $global_talent->photo = $upload_photo->getClientOriginalName();
                $global_talent->photo_path = $path;
			}
		}
        
        $global_talent->gt_name = $request->input('gt_name');
        $global_talent->school = $request->input('school');
        $global_talent->faculty = $request->input('faculty');
        $global_talent->introduction = $request->input('introduction');
        $global_talent->video = $request->input('video');
        $global_talent->gt_email = $request->input('gt_email');

        $global_talent->save();

        return redirect()->route('gt.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $global_talent = GlobalTalent::find($id);

        return view('gt.show', compact('global_talent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $global_talent = GlobalTalent::find($id);

        return view('gt.edit', compact('global_talent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $global_talent = GlobalTalent::find($id);
        
        $global_talent->gt_name = $request->input('gt_name');
        $global_talent->school = $request->input('school');
        $global_talent->faculty = $request->input('faculty');
        $global_talent->introduction = $request->input('introduction');
        $global_talent->photo = $request->input('photo');
        $global_talent->video = $request->input('video');
        $global_talent->gt_email = $request->input('gt_email');

        $global_talent->save();

        return redirect()->route('gt.show', ['id' => $global_talent->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $global_talent = GlobalTalent::find($id);
        $global_talent->delete();

        return redirect('member/show');
    }
}
