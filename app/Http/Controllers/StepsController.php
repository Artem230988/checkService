<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;
use App\Check;

class StepsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userBanned');
    }


    public function update(Check $check, Step $step)
    {
		if(!request()->has('body'))
		{
            $step->completed = request()->has('completed');
	        $step->update();
	        return redirect()->route('checks.show', compact('check'));
	    }
	    else
	    {
            $this->validate(request(), [
                'body' => 'required|min:3'
            ]);
            
	        $step->body = request('body');
	        $step->update();
	        return redirect()->route('checks.show', compact('check'));
	    }
    }


    public function destroy(Check $check, Step $step)
    {
        $step->delete();

        return back()->with('success', 'Пункт чек-листа удален');
    }


    public function edit(Check $check, Step $step)
    {
        return view('steps.edit', compact('step'));
	}


	public function store(Check $check)
    {
    	$this->validate(request(), [
            'body' => 'required|min:3',
        ]);

        $step = new Step;
		$step->body = request('body');
		$step->check_id = $check->id;
		$step->save();

		return redirect()->route('checks.show', compact('check'));
    }

   
}
