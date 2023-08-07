<?php
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Controllers\PassengerController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/users',function(){
    return UserResource::collection(User::all());
});
Route::get('/user/{id}',function($id){
    return new UserResource(User::findOrFail($id));
});
Route::post('/user', [UserController::class,'store']);

Route::put('/user/{id}', [UserController::class,'update']);
Route::delete('/user/{id}', [UserController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::resource('passengers', PassengerController::class);



// Route::post('login', [UserController::class, 'login']);
// Route::post('register', [PassengerController::class, 'register']);

// Route::put('passengers/{id}', [PassengerController::class, 'update']);
// Route::delete('passengers/{id}', [PassengerController::class, 'delete']);

