<?php

class GoalsController extends BaseController 
{
	
	public function showGoals()
	{
		Session::regenerate();
		
		if(Auth::check())
		{
			$id = Auth::user()->id;
			$goals = Goal::where('id', $id)->get();
  			
  			return View::make('users.goals')->with('goals',$goals);	
			
		}
			return Redirect::to('/')->with('message', 'Please log in first!');
	}
	
			
	public function setGoals()
	{
		if(Auth::check())
		{
			$goal = new Goal;
			$goal->id = Auth::user()->id;
			$goal->goal_type = Input::get('goal_type');
			$goal->weight = Input::get('weight');
			$goal->time_interval = Input::get('time_interval');
			$goal->time_unit = Input::get('time_unit');
			$goal->save();
			
			return Redirect::to('goals');
		}	
		return Redirect::to('/')->with('message', 'Please log in first!');
	}
	
}