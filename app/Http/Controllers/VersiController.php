<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\versi;
use DB;
use App\Transformers\VersiTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class VersiController extends Controller
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

      $data = versi::join('project', 'project.id_project', '=', 'versi.id_project')
      ->join('user', 'user.id_user', '=', 'project.id_user')   
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')  
      ->paginate(5);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new VersiTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }
    public function tampilversi(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $cari=$request->id_versi;
      $data = versi::join('project', 'project.id_project', '=', 'versi.id_project')
      ->join('user', 'user.id_user', '=', 'project.id_user')   
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')  
      ->where('id_versi','=', $cari)
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new VersiTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }
    public function tampilproject(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $cari=$request->id_project;
      $data = versi::join('project', 'project.id_project', '=', 'versi.id_project')
      ->join('user', 'user.id_user', '=', 'project.id_user')   
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')  
      ->where('versi.id_project','=', $cari)
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new VersiTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }


    public function create(Request $request)
    {
    	// extract($request->json()->all());
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: *");

    	$data = new versi();

    	$data->id_project = $request->id_project;
    	$data->major = $request->major;
    	$data->minor = $request->minor;
    	$data->patch = $request->patch;
    	$data->fase_release = $request->fase_release;

    	$data->save();
    	return response()->json($data);
    }
    public function createawal(Request $request)
    {
      // extract($request->json()->all());
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: *");

      $data = new versi();

      $data->id_project = $request->id_project;
      $data->major = $request->major;
      $data->minor = $request->minor;
      $data->patch = $request->patch;
      $data->fase_release = "";

      $data->save();
      return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	// extract($request->json()->all());
       
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: *");
      $id_project = $request->id_project;
      $major = $request->major;
      $minor = $request->minor;
      $patch = $request->patch;
      $fase_release = $request->fase_release;

		  $data = versi::find($id);

		  $data->id_project = $id_project;
    	$data->major = $major;
    	$data->minor = $minor;
    	$data->patch = $patch;
    	$data->fase_release = $fase_release;

  		$data->save();
  		return response()->json($data);
    }

    public function destroy($id)
    {
      header("Access-Control-Allow-Origin: *");
        header ("Content-Type: *");

      // Route::delete('jenis/relasi/{id}', function ($id));
      $data = versi::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
