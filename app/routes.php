<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

	// Route for the index page
	Route::any('/', array( 'as' => 'home', 'uses' => 'HomeController@showIndex' ));	
	
	// Route for the About page
	Route::any('about', array('uses' => 'HomeController@showAbout'));
	
	// Route for the Contact page
	Route::any('contact', array('uses' => 'HomeController@showContact'));
	
	// Route for the Resource page
	Route::any('resource', array('uses' => 'HomeController@showResource'));
	
	// Route for the Help page
	Route::any('help', array('uses' => 'HomeController@showHelp'));
	
	// Route to show the login form
	Route::get('users/login', array('uses' => 'HomeController@showLogin'));

	// Route to process the form
	Route::post('users/dologin', array('uses' => 'HomeController@doLogin'));
	
	// Route to Forgotten Password form
	Route::any('password/forgot', array('uses' => 'RemindersController@checkUser'));
	
	// Route to check security question and give new password
	Route::any('password/checkSecurityQuestion', array('uses' => 'RemindersController@checkSecurityQuestion'));
	
		// Route to resetting the password
/* 	Route::any('password/reset', array('uses' => 'RemindersController@goToReset')); */
	
	// Route of reminding password
	Route::controller('password', 'RemindersController');

	// Route to the home page, after login
	Route::any('home', array('uses' => 'UsersController@getDashboard'));
	
	// Route to logout the current user
	Route::get('logout', array('uses' => 'HomeController@doLogout'));
	
	// Route to Goals page
	Route::any('goals', array('uses' => 'GoalsController@showGoals'));
	
	// Route to set Goal
	Route::any('goals/set',array('uses' => 'GoalsController@setGoals'));

	// Route to Achievements page
	Route::get('achievements', array('uses' => 'AchievementsController@showAchievements'));

	Route::post('achievements', array('uses' => 'AchievementsController@editAchievements'));

	// Route to Exercise page
	Route::any('exercises', array('uses' => 'ExercisesController@showExercises'));
	
	// Route to save exercise
	Route::any('exercises/save', array('uses' =>'ExercisesController@saveExercises'));
	
	// Route to save exercise
	Route::any('exercises/delete', array('uses' =>'ExercisesController@deleteExercises'));

	// Route to Meal Plan page
	Route::any('mealPlan', array('uses' => 'mealPlanController@showMealPlan'));

	// Route to the account settings, after login
	Route::any('settings', array('uses' => 'UsersController@showSettings'));
	
	// Route to update the info
	Route::any('users/update', array('uses' => 'UsersController@postUpdate'));
	
	// Route to the Diary page, after login
	Route::any('diary', array('uses' => 'DiaryController@showDiary'));

	// Route to search the foods table for autocomplete
	Route::get('diary/search', array('uses' => 'DiaryController@getMatchingFood'));

	// Route to add entry to diary
	Route::any('diary/add', array('uses' => 'DiaryController@addToDiary'));
	
	// Route to view matching foods
	Route::any('diary/found_foods', array('uses' => 'DiaryController@showMatchingFoods'));
	
	// Route to Personal status page
	Route::any('status', array('uses' => 'StatusController@showStatus'));
	
	// Route to update status
	Route::any('status/set', array('uses' => 'StatusController@setStatus'));
	
	// Route to set allergy
	Route::any('allergy/set', array('uses' => 'StatusController@setAllergy'));

	// Route to set disease
	Route::any('disease/set', array('uses' => 'StatusController@setDisease'));
	
	// Route to the Progress page, after login
	Route::any('progress', array('uses' => 'ProgressController@showProgress'));
	
	// Route to the Deleting account.
	Route::any('delete',array('uses' => 'UsersController@deleteAccount'));
	
	Route::controller('users', 'UsersController');

	// Route::post('deploy',array('uses' => 'HomeController@deploy'));
	Route::get('deploy',array('uses' => 'HomeController@deploy'));

	Route::get('BMI', array('uses' => 'UsersController@BMICalculator'));
	Route::post('BMI', array('uses' => 'UsersController@updateBMI'));
