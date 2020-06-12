<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Check;
use App\User;


class ChecksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userBanned')->except('index', 'show');
    }

    public function index()
    {

        $checks = Check::latest()->where('owner_id', '=', \Auth::user()->id)->get();
        return view('checks.index', compact('checks'));
    }


    public function create()
    {
        return view('checks.create');
    }


    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        $check = new Check;
        $check->title = request('title');
        $check->description = request('description');
        $check->owner_id = \Auth::user()->id;

        $user = User::find($check->owner_id);
        $user->count_checks = $user->count_checks + 1;

        if($user->count_checks > $user->max_checks)
        {
            return redirect()->route('checks.index')->with('success', 'Вы больше не можете создавать чек-листы, максимальное количество: '.$user->max_checks);
        }
        $user->save();

        $check->save();

        return redirect()->route('checks.index')->with('success', 'Чек-лист успешно создан');
    }


    public function show(Check $check)
    {
        if($check->owner_id != \Auth::user()->id)
        {
            return redirect()->route('checks.index')->withErrors('Вы не можете просматривать данный чек');
        }

        return view('checks.show', compact('check'));
    }


    public function edit(Check $check)
    {
        if($check->owner_id != \Auth::user()->id)
        {
            return redirect()->route('checks.index')->withErrors('Вы не можете просматривать данный чек');
        }

        return view('checks.edit', compact('check'));
    }


    public function update(Check $check)
    {   
        if($check->owner_id != \Auth::user()->id)
        {
            return redirect()->route('checks.index')->withErrors('Вы не можете редактировать данный чек');
        }

        $attributes = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        $check->update($attributes);
        return redirect()->route('checks.show', compact('check'))->with('success', 'Отредактирован');
    }


    public function destroy(Check $check)
    {
        if($check->owner_id != \Auth::user()->id)
        {
            return redirect()->route('checks.index')->withErrors('Вы не можете удалять данный чек');
        }
        $user = User::find($check->owner_id);
        $user->count_checks = $user->count_checks - 1;
        $check->delete();
        $user->save();

        return redirect()->route('checks.index')->with('success', 'Чек-лист удален');
    }
}
