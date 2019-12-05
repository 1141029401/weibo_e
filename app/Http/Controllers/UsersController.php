<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //中间件过滤
    public function __construct(){

        // except 黑名单机制, 对应的方法不需要过滤
        $this->middleware('auth', [            
          'except' => ['show', 'create', 'store','index']
        ]);

        // 限制只有未登录用户才能访问注册页面
        $this->middleware('guest', [
            'only' => ['create']
        ]);

    }


    //显示用户
    public function index(){
        
        $users = User::paginate(10);

        return view("users.index",compact("users"));
    }

	//创建用户
    public function create()
    {
        return view('users.create');
    }

    //显示用户个人中心
    public function show(User $user)
    {	
    	//dump($user);
    	//dump(compact('user'));
        return view('users.show', compact('user'));
    }

    //处理创建请求
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //注册成功后执行登录
        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }

    /**
     * [edit 编辑用户页面]
     * @param  User   $user [description]
     * @return [type]       [description]
     */
    public function edit(User $user){


        return view("users.edit",compact("user"));
    }


    /**
     * [update 处理编辑用户请求]
     * @param  User    $user    [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(User $user, Request $request){

        //验证授权
        $this->authorize('update', $user);

        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);

    }

    /**
     * [destroy 删除]
     * @param  User   $user [description]
     * @return [type]       [description]
     */
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }

}
