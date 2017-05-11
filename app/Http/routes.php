<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('register', function () {
	return view('register');
});

Route::post('register', function () {
	$user = new User;
	$user->email = Input::get('email');
	$user->name = Input::get('name');
	$user->password = Hash::make(Input::get('password'));
	$user->save();
	
	$theEmail = Input::get('email');
	return view('thanks', array('theEmail' => $theEmail));
});

Route::get('login', function () {
	return view('login');
});

Route::post('login', function () {
	$credentials = Input::only('email', 'password');
	if(Auth::attempt($credentials)) {
		$user = Auth::user();
		$current_group = 0;
		session()->put('user_id', $user->id);
		session()->put('current_group', $current_group);
		return Redirect::to('profile');
	}
	return view('login');
});

Route::get('logout', function () {
	Auth::logout();
	return view('logout');
});

Route::post('new_group', function () {
	$group = new Group;
	$group->parent_id = session()->get('current_group');
	$group->user_id = session()->get('user_id');
	$group->name = Input::get('name');
	$group->visible = 1;
	$group->save();
	
	$theEmail = Input::get('email');
	return Redirect::to('profile');
});

Route::post('edit_group', function () {
	$group = Group::find(Input::get('id'));
	$group->name = Input::get('name');
	$group->save();
	
	$theEmail = Input::get('email');
	return Redirect::to('profile');
});

Route::get('profile', array(
	'middleware' => 'auth', 
	function () {
		return view('profile');
}));

Route::get('groups', [
    'middleware' => 'auth',
    'uses' => 'GroupController@index'
]);

Route::get('profile/{group_id}', function ($group_id) {
	session()->set('current_group', $group_id);
	return Redirect::to('profile');
});

Route::get('delete_group/{group_id}', function ($group_id) {
	$group = Group::find($group_id);
	$group->visible = 0;
	$group->save();
	
	//Group::destroy($group_id);
	return Redirect::to('profile');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function () {

	$userName = Input::get('name');
	$userEmail = Input::get('email');
	$userMessage = Input::get('message');
	
	Mail::send('emails.contactForm', ['userName' => $userName, 'userEmail' => $userEmail, 'content' => $userMessage], function ($message) {
	    $message->from(Input::get('email'), Input::get('name'))
	    		->to('freitascbruno@gmail.com')
	    		->subject('GO Contact Form');
	});
	
    return view('home');
});

Route::get('/dbedit', function () {
	/*
	Schema::create('groups', function($newtable) {
		$newtable->increments('id');
		$newtable->integer('parent_id');
		$newtable->string('name');
		$newtable->text('description');
		$newtable->boolean('visible');
		$newtable->timestamps();
	});
	*/
	return 'database edits have been done';
	
});