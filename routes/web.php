<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    Echo "Mohamed Adel";
});

Route::get('/users',function()
{
   $users=[
    ["id"=>1,"name"=>"ayaat","age"=>24],
    ["id"=>2,"name"=>"nada","age"=>27],
    ["id"=>3,"name"=>"eman","age"=>25],
   ];
//    return $users;
return view('usersData',["users"=>$users]);
});
/*** display user by id */
Route::get('/users/{id}',function($id)
{
   $users=[
    ["id"=>1,"name"=>"ayaat","age"=>24],
    ["id"=>2,"name"=>"nada","age"=>27],
    ["id"=>3,"name"=>"eman","age"=>25],
   ];
//    return $users;
// if($id<count($users))
// {
//     return $users[$id-1];
// }
if ($id > 0 && $id <= count($users)) {
    return view('userDetail', ["user" => $users[$id - 1]]);
} 
else{
    return abort(404);
}
})->where('id','[0-9]+');


Route::resource('tracks', TrackController::class);
Route::get('/tracks', [TrackController::class, 'index']);
Route::get('/tracks/{id}', [TrackController::class, 'show']);
Route::delete('/tracks/{id}', [TrackController::class, 'destroy']);
// Route::resource('tracks', TrackController::class);
