<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Check;

class ApiChecksController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userBanned')->except('index', 'show');
    }

    public function index()
    {
         
        return Check::latest()->where('owner_id', '=', \Auth::user()->id)->get();
    }


    public function show(Check $check)
    {
        if($check->owner_id == \Auth::user()->id)
        {
            return $check;
        }
        return response()->json('Это не ваш чек-лист', 404);
    }


    public function store(Request $request)
    {
        $check = Check::create($request->all());
        
        return response()->json('Чек-лист добавлен', 201);
    }


    public function update(Request $request, Check $check)
    {
        if($check->owner_id == \Auth::user()->id)
        {
            $check->update($request->all());
            return response()->json('Обновлен чек-лист с id: '.$check->id, 200);
        }
        return response()->json('Это не ваш чек-лист', 404);

    }


    public function destroy(Check $check)
    {
        if($check->owner_id == \Auth::user()->id)
        {
            $check->delete();
            return response()->json(null, 204);
        }
        return response()->json('Это не ваш чек-лист', 404);
    }

}
