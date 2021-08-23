<?php

// use Illuminate\Contracts\Pipeline\Pipeline;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Route;
use App\Jobs\myfirstjob;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/data', [App\Http\Controllers\ShowUsersController::class, 'index'])->name('data');
// Route::get('/users', [App\Http\Controllers\ShowUsersController::class, 'getUsers'])->name('get.users');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');




Route::get('/', function () {

    $user = App\Models\User::first();

    // dispatch(new MyfirstJob($user));

    App\Jobs\MyfirstJob::dispatch($user)->onQueue('high');

    return 'Finished';
});

Route::get('/hello', function () {

    function concat($trasnform, ...$strings)
    {
        $string = '';
        foreach ($strings as $sting) {
            $string .= $sting;
        }
        return ($trasnform($string));
    }

    $echo = concat("strtoupper",  "men", "   ", "salam", "hello", "gowmy", 8);
    return $echo;
});

// Route::get('/', function () {

//     $pipeline = app(Pipeline::class);
//     $pipeline->send('hello freaking world')
//         ->through([
//             function ($string, $next) { //pipe-Hello freaking world
//                 $string = ucwords($string);
//                 return $next($string);
//             },

//             function ($string, $next) { //pipe
//                 $string = str_ireplace('freaking', '', $string);
//                 return $next($string);
//             },

//             myfirstjob::class
//         ])
//         ->then(function ($string) {
//             dump($string);
//         });
//     return 'Done';
// });

Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
