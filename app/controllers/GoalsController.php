<?php

class GoalsController extends BaseController 
{
	
	public function showGoals()
	{
		Session::regenerate();
		
		if(Auth::check())
		{

			$id = Auth::user()->id;
			$goals = Goal::where('uid', $id)->get();
			if(Auth::user()->weight==0){
				Session::flash('message', 'Please a weight in our systems first!');

			}
  			return View::make('users.goals')->with('goals',$goals);	
			
		}
			return Redirect::to('/')->with('message', 'Please log in first!');
	}
	public function setGoals()
	{
		$day_len = 86400;
		$month_len = 2592000;
		$year_len = 31536000;

		$validator = Validator::make(
			array(
				'weight' => Input::get('weight'),
				'time_interval'=>Input::get('time_interval'),			
			),
			array(
				'time_interval'=>'required|integer|min:1',
				'weight' => 'required|integer|min:1',
			)
		);
		if(Auth::check() && $validator->passes() && Auth::user()->weight!=0)
		{

			if(Input::get('goal_type')==="Lose" && Auth::user()->weight+-1*Input::get('weight'<=0)){
				return Redirect::to('goals')->with('message', 'Please set a valid and positive goal!');

			}
			$goal = new Goal;
			$goal->uid = Auth::user()->id;
			$goal->goal_type = Input::get('goal_type');
			$goal->weight = Input::get('weight');
			$goal->weight_unit = Input::get('weight_unit');
			$goal->time_interval = Input::get('time_interval');
			$goal->time_unit = Input::get('time_unit');
			$goal->save();

			$achievement = new Achievement;
			$achievement->uid = Auth::user()->id;
			$weightMultiplier = Input::get("goal_type")==="Lose"?-1:1;
			//weight is goal weight
			$achievement->weight = $weightMultiplier*Input::get('weight')+Auth::user()->weight;
			$achievement->oWeight = Auth::user()->weight;
			$achievement->weight_unit = Input::get('weight_unit');
			$achievement->goal_type = Input::get('goal_type');

			// ugly ternary operator chain, dont copy me.
			$endDate = ((int)Input::get('time_interval'))*
				(Input::get('time_unit')==='Days'?$day_len:(
						Input::get('time_unit')==='Months'?$month_len:
							$year_len));
			$endDate+=time();
			$achievement->start_date = date( 'Y-m-d H:i:s', time());
			$achievement->eta = date( 'Y-m-d H:i:s', $endDate);

			$achievement->completed = false;
			$achievement->missed = false;
			$achievement->save();
			$test = AchievementHelper::checkAchievements();
			if(count($test)>0){
				return Redirect::to('goals')->with('message',"Congratulations! You have completed a goal!");
			}
			return Redirect::to('goals');
		}	
		else if(Auth::check() && $validator->fails()){
			return Redirect::to('goals')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
		else if(Auth::user()->weight==0){			
			return Redirect::to('goals')->with('message', 'Please update your current weight in the system before setting goals.');
}
		return Redirect::to('/')->with('message', 'Please log in first!');
	}
}

