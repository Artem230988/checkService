<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Check;
use App\User;


class ShowChecksController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($id)
    {
    	$checks = Check::latest()->where('owner_id', '=', $id)->get();
        return view('showChecks.index', compact('checks'));
    }

    public function show(User $user, $id)
    {
       $check = Check::find($id);

        return view('showChecks.show', compact('check'));
    }
}
