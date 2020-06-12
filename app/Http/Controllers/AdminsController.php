<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminsController extends Controller
{
        public function __construct()
    {
        $this->middleware('superAdmin');
    }


	public function index()
	{
		$users = User::where('users.role_id', '=', '3')->get();
		return view('admins.index', compact('users'));
	}

	public function show($id)
    {
        $user = User::find($id);
        return view('admins.show', compact('user'));
    }


    public function edit($id)
	{
		$user = User::find($id);

		return view('admins.edit', compact('user'));
	}
    

    public function update($id)
    {   

    	$user = User::find($id);

    	if(request()->has('max_checks'))
    	{
            $user->max_checks = request('max_checks');
            $user->save();
        }
        else
        {
        	$user->banned = abs($user->banned - 1);
        	$user->save();
		}
        return view('admins.show', compact('user'))->with('success', 'Отредактирован');
    }
}
