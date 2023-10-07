<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {

    $users = User::paginate(5);
    return view('home',compact('users'));
    
})->name('home');

Route::get('to/{id}', function ($id) {

    $user = User::find($id);
    $users = User::where('id', '!=', $id)->get();
    return view('to',compact('user','users'));

})->name('to');

Route::post('to/{id}', function (Request $request,$id) {

    //add balance
    $to_user = User::find($id);
    $to_user['current_balance'] = $to_user['current_balance']+$request['quantity'];
    $to_user->save();
    
    //Subtract balance
    $from_user = User::find($request->from_id);
    $from_user['current_balance'] = $from_user['current_balance']-$request['quantity'];
    $from_user->save();

    return redirect()->route('home')->with(['success'=>'Transaction made successfully. From: ('.$from_user->name.') To: ('.$to_user->name.') Quantity: '.$request['quantity']]);

});

Route::get('from/{id}', function ($id) {

    $user = User::find($id);
    $users = User::where('id', '!=', $id)->get();
    return view('from',compact('user','users'));

})->name('from');

Route::post('from/{id}', function (Request $request,$id) {

    //add balance
    $to_user = User::find($request->to_id);
    $to_user['current_balance'] = $to_user['current_balance']+$request['quantity'];
    $to_user->save();

    //Subtract balance
    $from_user = User::find($id);
    $from_user['current_balance'] = $from_user['current_balance']-$request['quantity'];
    $from_user->save();

    return redirect()->route('home')->with(['success'=>'Transaction made successfully. From: ('.$from_user->name.') To: ('.$to_user->name.') Quantity: '.$request['quantity']]);

})->name('from');

