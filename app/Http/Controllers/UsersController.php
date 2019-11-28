<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{

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

}
