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
Route::get('/kabupaten', 'App\Http\Controllers\IndekostController@index')->name('lokasi.kabupaten');
Route::get('kabupaten/{carikecamatan}', 'App\Http\Controllers\IndekostController@show')->name('lokasi.kecamatan');
Route::get('desa/{caridesa}', 'App\Http\Controllers\IndekostController@showdesa')->name('lokasi.desa');



Route::get('detail/{caridetailkost}', 'App\Http\Controllers\DetailController@show')->name('pilih.indekost');
Route::get('konten/{querydetail}', 'App\Http\Controllers\DetailController@isikost')->name('detaillokasi.show');

//Fasilitas
Route::get('/filterkebutuhan', 'App\Http\Controllers\IndekostController@fasilitas1');
Route::get('fasilitas/{idfilter1}', 'App\Http\Controllers\IndekostController@fasilitas2')->name('fasilitas.filter');

// Route::get('fasilitas/indekost/{tampilfilterprimer}', 'App\Http\Controllers\DetailController@fasilitaskosttampil');

//Harga
Route::get('/filterharga', 'App\Http\Controllers\IndekostController@fharga');
Route::get('harga/{idfilterharga}', 'App\Http\Controllers\IndekostController@fharga2')->name('harga.filter');

// Route::get('harga/indekost/{tampilfilterrentang}', 'App\Http\Controllers\DetailController@fasilitaskosttampil');

//Arah
Route::get('/filterarah', 'App\Http\Controllers\ArahController@farah')->name('arah.index');
Route::get('filterarah/{cariarah}', 'App\Http\Controllers\ArahController@farah2')->name('arah.tampil');

// Route::get('arah3/indekost/{tampilfilterarah}', 'App\Http\Controllers\DetailController@fasilitaskosttampil')->name('arah.kost');

//status
Route::get('/filterstatus', 'App\Http\Controllers\IndekostController@fstatus');
Route::get('status/{caristatus}', 'App\Http\Controllers\IndekostController@fstatus2');

// Route::get('status/indekost/{tampilfilterstatus}', 'App\Http\Controllers\DetailController@fasilitaskosttampil');

//Searching
Route::get('search/{id}', 'App\Http\Controllers\DetailController@isikost');

//Detail indekost
Route::get('search/lokasi/{lokasi}', 'App\Http\Controllers\IndekostController@show');

// konten
Route::get('lokasi/{lokasi}', 'App\Http\Controllers\KontenController@kontenlokasi')->name('konten.lokasi');
Route::get('lokasikecamatan/{lokasikecamatan}', 'App\Http\Controllers\KontenController@kontenlokasikecamatan')->name('konten.lokasikecamatan');
Route::get('fs/{tersedia}', 'App\Http\Controllers\KontenController@kontenfasilitass')->name('fs.show');
Route::get('fp/{memiliki}', 'App\Http\Controllers\KontenController@kontenfasilitasp')->name('fp.show');
Route::get('hdp/{menghadap}', 'App\Http\Controllers\KontenController@kontenmenghadap')->name('hadap.show');
Route::get('st/{status}', 'App\Http\Controllers\KontenController@kontenstts')->name('stts.show');
Route::get('hg/{rentang}', 'App\Http\Controllers\KontenController@kontenharga')->name('harga.show');
