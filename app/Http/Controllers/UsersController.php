<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\Transformers\UserTransformer;
use File;
use Storage;
// use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UsersController extends Controller
{
  public function option(Request $request){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: application/json");
  }
	public function tampil(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      
      $data = users::all();
     
      return fractal()
            ->collection($data)
            ->transformWith(new UserTransformer)
            ->addMeta([
              ''
            ])
            ->toArray();
    }


    public function create(Request $request)
    {
    	// extract($request->json()->all());
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");
      header ("Content-Type: application/json");
      $cari = $request->email_user;

      $data = users::where ( 'email_user', '=', $cari  )->get ();

      if (count ( $data ) > 0)
        return response()->json('Data Sudah Ada');
      else
      	$data2 = new users();

      	$data2->email_user = $request->email_user;
      	$data2->password_user = $request->password_user;
      	$data2->nama_user = $request->nama_user;
      	$data2->save();
      	return response()->json($data2);
    }

    public function cari(Request $request)
    {
      // extract($request->json()->all());
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $cariEmail = $request->email_user;
      $cariNama = $request->nama_user;


      $data = users::where ( 'nama_user', 'LIKE', '%' . $cariNama . '%' )->orWhere ( 'email_user', 'LIKE', '%' . $cariEmail . '%' )->get ();

      if (count ( $data ) > 0)
        // return view ( 'welcome' )->withDetails ( $data )->withQuery ( $cari );
        return response()->json($data);
      else
        // return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
        return response()->json('Data Kosong !');
        
    }
    public function cariGoogle(Request $request)
    {
      // extract($request->json()->all());
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $cariEmail = $request->email_user;
      // $cariNama = $request->nama_user;


      $data = users::where  ( 'email_user', '=', $cariEmail )->get ();

      if (count ( $data ) > 0)
        // return view ( 'welcome' )->withDetails ( $data )->withQuery ( $cari );
        return response()->json($data);
      else
        // return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
        return response()->json('Data Kosong');
        
    }

    public function login(Request $request)
    {
      // extract($request->json()->all());
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $email = $request->email_user;
      $password = $request->password_user;

      // $data = users::where ( 'email_user', 'LIKE', '%' . $email . '%' )->where ( 'password_user', 'LIKE', '%' . $password . '%' )->get ();
      $data = users::where ( 'email_user', $email )->where ( 'password_user',  $password )->get ();

      if (count ( $data ) > 0)
        // return view ( 'welcome' )->withDetails ( $data )->withQuery ( $cari );
        return response()->json($data);
      else
        // return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
        return response()->json('Data Kosong');
        
    }

    public function update(Request $request, $id)
    {
    	// extract($request->json()->all());
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $email_user = $request->email_user;
      $password_user = $request->password_user;
      $nama_user = $request->nama_user;

  		$data = users::find($id);
  		$data->email_user = $email_user;
    	$data->password_user = $password_user;
    	$data->nama_user = $nama_user;
		  $data->save();
		  return response()->json($data);     
    }

    public function destroy($id)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: *");

      $data = users::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
