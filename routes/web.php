<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });



Route::get('/', 'App\Http\Controllers\PagesController@home');
Route::get('/browsing', 'App\Http\Controllers\PagesController@browsing');
Route::get('/searching', 'App\Http\Controllers\PagesController@searching');

//Lokasi
Route::get('/kabupaten', 'App\Http\Controllers\IndekostController@index');
Route::get('kecamatan/{carikecamatan}', 'App\Http\Controllers\IndekostController@show');


Route::get('kecamatan/detail/{caridetailkost}', 'App\Http\Controllers\DetailController@show');
Route::get('kecamatan/detail/konten/{querydetail}', 'App\Http\Controllers\DetailController@isikost');

//Fasilitas
Route::get('/filterkebutuhan', 'App\Http\Controllers\IndekostController@fasilitas1');
Route::get('fasilitas/{idfilter1}', 'App\Http\Controllers\IndekostController@fasilitas2');

Route::get('fasilitas/indekost/{tampilfilterprimer}', 'App\Http\Controllers\DetailController@fasilitaskosttampil');

//Harga
Route::get('/filterharga', 'App\Http\Controllers\IndekostController@fharga');
Route::get('harga/{idfilterharga}', 'App\Http\Controllers\IndekostController@fharga2');

Route::get('harga/indekost/{tampilfilterrentang}', 'App\Http\Controllers\DetailController@fasilitaskosttampil');

//Arah
Route::get('/filterarah', 'App\Http\Controllers\IndekostController@farah');
Route::get('arah/{cariarah}', 'App\Http\Controllers\IndekostController@farah2');

Route::get('arah/indekost/{tampilfilterarah}', 'App\Http\Controllers\DetailController@fasilitaskosttampil');

//status
Route::get('/filterstatus', 'App\Http\Controllers\IndekostController@fstatus');
Route::get('status/{caristatus}', 'App\Http\Controllers\IndekostController@fstatus2');

Route::get('status/indekost/{tampilfilterstatus}', 'App\Http\Controllers\DetailController@fasilitaskosttampil');

//Searching
Route::get('search/{id}', 'App\Http\Controllers\DetailController@isikost');
