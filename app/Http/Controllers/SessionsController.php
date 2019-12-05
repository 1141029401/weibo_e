<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class SessionsController extends Controller
{ 

  public function __construct(){
    //限制未登录用户才能访问登录页面
    $this->middleware('guest', [
      'only' => ['create']
    ]);
  }


  //显示登录页面
  public function create(){


  	return view("sessions.create");
  }

  //处理登录请求
  public function store(Request $request){

  	$credentials = $this->validate($request, [
         'email' => 'required|email|max:255',
         'password' => 'required'
     	]);

    //验证登录，并存储Session
  	if(Auth::attempt($credentials, $request->has("remember"))){
  		session()->flash('success', '欢迎回来！');
      //定义默认跳转地址
      $fallback = route('users.show', Auth::user());
      //intended  将页面重定向到上一次请求尝试访问的页面上 没有则跳转默认地址
      return redirect()->intended($fallback);
  	}else{
  		session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
      return redirect()->back()->withInput();
  	}

    return;

  }

  //处理退出
  public function destroy(){

    Auth::logout();
    session()->flash('success', '您已成功退出！');
    return redirect('login');
  }
}
