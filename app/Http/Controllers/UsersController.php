<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
//邮件类
use Mail;

class UsersController extends Controller
{
    //中间件过滤
    public function __construct(){

        // except 黑名单机制, 对应的方法不需要过滤
        $this->middleware('auth', [            
          'except' => ['show', 'create', 'store','index','confirmEmail']
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
        //查询当前用户所有的微博
    	$statuses = $user->statuses()
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);

        return view('users.show', compact('user', 'statuses'));
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

        //注册成功后发送邮件
        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }

    /**
     * [sendEmailConfirmationTo 发送邮件]
     * @param  [type] $user [当前用户实例]
     * @return [type]       [description]
     */
    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'summer@example.com';
        $name = 'Summer';
        $to = $user->email;
        $subject = "感谢注册 Weibo 应用！请确认你的邮箱。";

        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
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

    /**
     * [confirmEmail 验证邮件]
     * @param  [type] $token [邮件验证码]
     * @return [type]        [description]
     */
    public function confirmEmail($token){

        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('users.show', [$user]);
    }

}
