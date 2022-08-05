<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenisbacklog;
use App\Transformers\JenisbacklogTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class JenisbacklogController extends Controller
{
    public function option(Request $request){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
    }
     public function tampilsemua(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $data = jenisbacklog::join('project', 'project.id_project', '=', 'jenis_backlog.id_project')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'jenis_backlog.id_sdlc')   
      ->join('versi', 'versi.id_versi', '=', 'jenis_backlog.id_versi')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      // ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->paginate(100);

      return fractal()
            ->collection($data)
            ->transformWith(new JenisbacklogTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }

    public function tampil(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $cari1 = $request->id_project;
      $cari2= $request->id_versi;
      $data = jenisbacklog::join('project', 'project.id_project', '=', 'jenis_backlog.id_project')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'jenis_backlog.id_sdlc')   
      ->join('versi', 'versi.id_versi', '=', 'jenis_backlog.id_versi')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->where('jenis_backlog.id_project', '=', $cari1)
      ->where('jenis_backlog.id_versi', '=', $cari2)
      ->paginate(100);

     return fractal()
            ->collection($data)
            ->transformWith(new JenisbacklogTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }

    public function create(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: *");
    	// extract($request->json()->all());

    	$data = new jenisbacklog();

      $data->id_project = $request->id_project;
      $data->id_sdlc = $request->id_sdlc;
      $data->id_versi = $request->id_versi;
      $data->nama_jenis_backlog = $request->nama_jenis_backlog;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	extract($request->json()->all());
      $id_project = $request->id_project;
      $id_sdlc = $request->id_sdlc;
      $id_versi = $request->id_versi;
      $nama_jenis_backlog = $request->nama_jenis_backlog;
	   	$data = jenisbacklog::find($id);

      $data->id_project = $id_project;
      $data->id_sdlc = $id_sdlc;
      $data->id_versi = $id_versi;
      $data->nama_jenis_backlog = $nama_jenis_backlog;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
      $data = jenisbacklog::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
