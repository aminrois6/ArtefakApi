<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::options('/users', 'UsersController@option');
Route::post('/users','UsersController@create'); 
Route::get('/users','UsersController@tampil');
Route::options('/users/update/{id}', 'UsersController@option');
Route::post('/users/update/{id}','UsersController@update');
Route::delete('/users/{id}','UsersController@destroy');
Route::post('/users/cari/','UsersController@cari');
Route::options('/users/carigoogle/', 'UsersController@option');
Route::post('/users/carigoogle/','UsersController@cariGoogle');
Route::options('/users/login/', 'UsersController@option');
Route::post('/users/login/','UsersController@login');


Route::post('/sdlc','SdlcController@create');
Route::get('/sdlc','SdlcController@tampil');
Route::put('/sdlc/{id}','SdlcController@update');
Route::delete('/sdlc/{id}','SdlcController@destroy');

Route::post('/role','RoleController@create');
Route::get('/role','RoleController@tampil');
Route::post('/role/{id}','RoleController@update');
Route::delete('/role/{id}','RoleController@destroy');

Route::post('/jenis','JenisController@create');
Route::get('/jenis','JenisController@tampilsemua');
Route::post('/jenis/data','JenisController@tampil');
Route::post('/jenis/{id}','JenisController@update');
Route::delete('/jenis/{id}','JenisController@destroy');

Route::options('/project', 'ProjectController@option');
Route::post('/project','ProjectController@create');
Route::get('/project','ProjectController@tampil');
Route::put('/project/{id}','ProjectController@update');
Route::options('/project', 'ProjectController@option');
Route::options('/project/{id}', 'ProjectController@option');
Route::delete('/project/{id}','ProjectController@destroy');
// Route::get('/project/tampil','ProjectController@tampiluser');
Route::get('/project/tampil',[App\Http\Controllers\ProjectController::class, 'tampiluser']);

Route::options('/member', 'MemberController@option');
Route::post('/member','MemberController@create');
Route::get('/member','MemberController@tampil'); 
Route::options('/member/{id}', 'MemberController@option');
Route::post('/member/{id}','MemberController@update');
Route::options('/member/{id}', 'MemberController@option');
Route::delete('/member/{id}','MemberController@destroy');
Route::get('/member/tampil',[App\Http\Controllers\MemberController::class, 'tampilmember']);
Route::get('/member/tampiluser',[App\Http\Controllers\MemberController::class, 'tampiluser']);
Route::get('/member/cariuser',[App\Http\Controllers\MemberController::class, 'tampiluser2']);

Route::post('/akses','AksesController@create');
Route::get('/akses','AksesController@tampil');
Route::put('/akses/{id}','AksesController@update');
Route::delete('/akses/{id}','AksesController@destroy');

Route::post('/invite','InviteController@create');
Route::get('/invite','InviteController@tampil');
Route::put('/invite/{id}','InviteController@update');
Route::delete('/invite/{id}','InviteController@destroy');

Route::post('/versi','VersiController@create');
Route::options('/versi', 'VersiController@option');
Route::get('/versi','VersiController@tampil');
// Route::post('/versi/project','VersiController@tampilproject');
Route::options('/versi/tampil', 'VersiController@option');
Route::get('/versi/tampil',[App\Http\Controllers\VersiController::class, 'tampilproject']);
Route::get('/versi/tampilversi',[App\Http\Controllers\VersiController::class, 'tampilversi']);
Route::post('/versi/{id}','VersiController@update');
Route::options('/versi/{id}', 'VersiController@option');
Route::delete('/versi/{id}','VersiController@destroy');

Route::post('/index','IndexController@create');
Route::get('/index','IndexController@tampil');
Route::put('/index/{id}','IndexController@update');
Route::delete('/index/{id}','IndexController@destroy');

Route::options('/artefak', 'ArtefakController@option');
Route::post('/artefak','ArtefakController@create');
Route::post('/artefak/awal','ArtefakController@createawal');
Route::get('/artefak','ArtefakController@tampil');
// Route::get('/artefak/project',[App\Http\Controllers\ArtefakController::class, 'tampilproject']);
Route::post('/artefak/project','ArtefakController@tampilproject');
// Route::get('/artefak/versi',[App\Http\Controllers\ArtefakController::class, 'tampilversi']);
Route::post('/artefak/versi','ArtefakController@tampilversi');
Route::options('/artefak/{id}', 'ArtefakController@option');
Route::post('/artefak/{id}','ArtefakController@update');
Route::post('/artefak/kosong/{id}','ArtefakController@update2');
Route::options('/artefak/{id}', 'ArtefakController@option');
Route::delete('/artefak/{id}','ArtefakController@destroy');

Route::options('/berkas/upload', 'BerkasController@option');
Route::post('/berkas/upload','BerkasController@create');
Route::options('/berkas', 'BerkasController@option');
Route::get('/berkas','BerkasController@tampil');
Route::post('/berkas/awal','BerkasController@tampilawal');
Route::post('/berkas/{id}','BerkasController@update');
Route::options('/berkas/{id}', 'BerkasController@option');
Route::delete('/berkas/{id}','BerkasController@destroy');
Route::options('/berkas/relasi/{id}', 'BerkasController@option');
Route::delete('/berkas/relasi/{id}','BerkasController@destroy2');

Route::post('/backlog','BacklogController@create');
Route::get('/backlog','BacklogController@tampil');
Route::post('/backlog/project','BacklogController@tampilproject');
Route::post('/backlog/{id}','BacklogController@update');
Route::delete('/backlog/{id}','BacklogController@destroy');

Route::options('/berkasbacklog', 'BerkasbacklogController@option');
Route::get('/berkasbacklog','BerkasbacklogController@tampil');
Route::post('/berkasbacklog','BerkasbacklogController@create');

Route::post('/jenisbacklog','JenisbacklogController@create');
Route::get('/jenisbacklog','JenisbacklogController@tampilsemua');
Route::options('/berkasbacklog/data', 'JenisbacklogController@tampil');
Route::post('/jenisbacklog/data','JenisbacklogController@tampil');
Route::post('/jenisbacklog/{id}','JenisbacklogController@update');
Route::delete('/jenisbacklog/{id}','JenisbacklogController@destroy');