<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');

    }

    /**
     * [store 发布微博]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request){

    	$this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);

        session()->flash('success', '发布成功！');
        return redirect()->back();

    }

    /**
     * [destory 删除微博]
     * @param  Status $status [description]
     * @return [type]         [description]
     */
    public function destroy(Status $status){

    	$this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();

    }

}
