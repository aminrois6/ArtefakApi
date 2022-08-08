<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;

use DB;

use App\Transformers\ProjectTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ProjectController extends Controller
{
  public function option(Request $request){
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
}
    public function tampil(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");

      $data = project::join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')    
      ->paginate(8);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new ProjectTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }
    public function tampiluser(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $cari = $request->id_user;

      $data = project::join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc') 
      ->where ( 'project.id_user', '=', $cari)   
      ->paginate(8);

      return fractal()
            ->collection($data)
            ->transformWith(new ProjectTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }
    public function tampilproject(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $cari = $request->id_project;

      $data = project::join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc') 
      ->where ( 'id_project', '=', $cari)   
      ->paginate(8);

      return fractal()
            ->collection($data)
            ->transformWith(new ProjectTransformer)
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

    	$data = new project();

    	$data->nama_project = $request->nama_project;
    	$data->id_user = $request->id_user;
    	$data->id_sdlc = $request->id_sdlc;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

    	// extract($request->json()->all());
      $nama_project = $request->nama_project;
      $id_user = $request->id_user;
      $id_sdlc = $request->id_sdlc;

  		$data = project::find($id);

  		$data->nama_project = $nama_project;
    	$data->id_user = $id_user;
    	$data->id_sdlc = $id_sdlc;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: *");

      $data = project::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
