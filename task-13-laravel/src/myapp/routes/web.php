<?php

use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


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


// All  listings
Route::get('/', function () {
    return view('listings',[
        'heading'=>'Latest Listings',
        'listings'=>Listing::all()
    ]);
});

// Single listing
Route::get('listings/{id}',function($id){
    return view('listing', [
        'listing' =>Listing::find($id)
    ]);
});

Route::get('/dbconn',function(){
    return view('dbconn');
});


/*
Route::get('/', function () {
    return view('listings',[
        'heading'=>'Latest Listings',
        'listings'=>[
            [
                'id'=>1,
                'title'=>'Listing One',
                'description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, culpa voluptatem. 
                                Ipsam, commodi ratione, quas quis error animi sit tempore, explicabo velit inventore dignissimos? 
                                Aliquam recusandae explicabo aspernatur ipsa numquam?'
            ],
            [
                'id'=>2,
                'title'=>'Listing Two',
                'description'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, culpa voluptatem. 
                                Ipsam, commodi ratione, quas quis error animi sit tempore, explicabo velit inventore dignissimos? 
                                Aliquam recusandae explicabo aspernatur ipsa numquam?'
            ]
        ]
    ]);
});
*/


/*
Route::get('/hello', function(){
    return response('<h1>Hello World</h1>',200)
                 ->header('Content-Type','text/plain');
});


Route::get('/post/{id}',function($id){
    ddd($id);
    return response('Post' . $id);
})->where ('id','[0-9]+');


Route::get('/search', function(Request $request){
    // dd($request);
    // dd($request->name.' '.$request->city);
    return $request->name.' '.$request->city;
});
*/