<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permission;


class PermissionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('superAdmin');
    }


    public function store(User $user, $name)
    {
    	$permission = new Permission;
		$permission->user_id = $user->id;
		$permission->permission_name = $name;
		$permission->save();

		return back();
    }


    public function destroy(User $user, Permission $permission)
    {
    	$permission->delete();

        return back();
    }
}
