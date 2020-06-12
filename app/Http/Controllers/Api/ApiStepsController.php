<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Step;
use App\Check;

class ApiStepsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $check = Check::find($id);
        if($check->owner_id == \Auth::user()->id)
        {
            $steps = Step::where('check_id','=', $id)->get();
            return $steps;
        }
        return response()->json('Это не ваш чек-лист', 404);
    }


    public function show(Check $check, Step $step)
    {
        if($check->owner_id == \Auth::user()->id)
        {
            return $step;
        }
        return response()->json('Это не ваш чек-лист', 404);
    }

    

    public function store(Request $request, Check $check)
    {
        if($check->owner_id == \Auth::user()->id)
        {
            $step = Step::create($request->all());
            return response()->json('Пункт в чек-лист добавлен', 201);
        }
        return response()->json('Это не ваш чек-лист', 404);
    }


    public function destroy(Check $check, Step $step)
    {
        if($check->owner_id == \Auth::user()->id)
        {        
            $step->delete();
            return response()->json('Удален шаг с id: '. $step->id, 204);
        }
        return response()->json('Это не ваш чек-лист', 404);
    }


    public function update(Request $request, Check $check, Step $step)
    {
        if($check->owner_id == \Auth::user()->id)
        {          
            $step->update($request->all());
            return response()->json('Обновлен шаг с id: '.$step->id, 200);
        }
        return response()->json('Это не ваш чек-лист', 404);
    }

}
