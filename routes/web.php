<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

//    $id = 10101;
//    $creator = "JIRAUSER".(string)$id;
//    $listIssue = DB::table('jiraissue')->where('creator', 'like', $creator)->get()->toArray();
//    $user = ['name'=> 'abc', 'years' => 10];
//    $user['listIssue'] = $listIssue;
//    $user = DB::table('cwd_user')->get();
//
//    $deleteAttribute =
////        DB::table('cwd_user_attributes')->where('user_id', '=', 10000)
////        ->where('attribute_name', 'like', 'level.id')
////        ->update(['ID' => 10226]);
////    dd($deleteAttribute);
//    $timestamp = 1687891708;
////    2023-6-28 01:48:28
//    $date = Carbon\Carbon::parse($timestamp)->format('Y-m-d h:m:i');
//    $lastId =  \App\Models\CwdUserAttributes::orderBy('ID', 'desc')->limit(1)->get();
//    $lastId = $lastId[0]['ID'];
    return view('welcome');
});
