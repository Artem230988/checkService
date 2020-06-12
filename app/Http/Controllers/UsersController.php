<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('userBanned')->except('index', 'show');
    }
    
    public function index()
    {
        $users = User::where('users.role_id', '=', '1')->paginate(2);
        return view('users.index', compact('users'));
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    

    public function edit($id)
    {
        if(\Auth::user()->role_id == 2)
        {
            $user = User::find($id);
            return view('users.edit', compact('user'))->with('success', 'Готово!');           
        }

        foreach(\Auth::user()->permissions as $permission)
        {
            if($permission->permission_name == 'Изменять макс. количество чек-листов')
            {
                $user = User::find($id);
                return view('users.edit', compact('user'))->with('success', 'Готово!');
            }
        }
        return back()->with('success', 'У вас нет на это прав');
    }


    public function update($id)
    {   

    	$user = User::find($id);

    	if(request()->has('max_checks'))
    	{
            $user->max_checks = request('max_checks');
            $user->save();
            return view('users.show', compact('user'))->with('success', 'Отредактирован');
        }
        if(\Auth::user()->role_id == 2)
        {
                $user->banned = abs($user->banned - 1);
                $user->save();
                return view('users.show', compact('user'))->with('success', 'Готово!');          
        }
        
        foreach(\Auth::user()->permissions as $permission)
        {
            if($permission->permission_name == 'Блокировать пользователей')
            {
                $user->banned = abs($user->banned - 1);
                $user->save();
                return view('users.show', compact('user'))->with('success', 'Готово!');
            }
        }

        return back()->with('success', 'У вас нет на это прав');
        

    }
}
