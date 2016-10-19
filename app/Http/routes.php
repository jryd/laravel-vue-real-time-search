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
    return view('welcome');
});

Route::post('/', function () {
    $query = Request::input('query');
    
    $users = App\User::where('name', 'LIKE', '%'.$query.'%')->get();
    
    $users->transform(function($user) use ($query)
    {
      $cases = [
            strtolower($query),
            ucfirst($query),
      ]; 
       
      foreach ($cases as $case)
      {
          $user->name = str_replace($case, '<b>' . $case . '</b>', $user->name);
      }
       
       return $user;
    });
    
    return response()->json([
       'users' => $users->toArray() 
    ]);
});

Route::get('/generate', function() {
    $users = factory(App\User::class, 500)->make()->toArray();
    
    App\User::insert($users);
    
    return "success";
});