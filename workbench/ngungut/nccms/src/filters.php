<?php
/*
|--------------------------------------------------------------------------
| Admin Login Filter
|--------------------------------------------------------------------------
|
*/

Route::filter('isAdmin', function($route, $request)
{
    if (!Session::has('logedin'))
    {
        if($request->segment(1) != 'login') return Redirect::to('login');
    }
});
