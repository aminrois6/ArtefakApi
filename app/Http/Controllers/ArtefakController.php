<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\artefak;
use Storage;
use Route;
use App\Transformers\ArtefakTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ArtefakController extends Controller
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
      
      $data = artefak::join('project', 'project.id_project', '=', 'artefak_project.id_project')   
      ->join('versi', 'versi.id_versi', '=', 'artefak_project.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'artefak_project.id_jenis')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new ArtefakTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
	}
	public function tampilproject(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
	  $cari = $request->id_project;
	  
      $data = artefak::join('project', 'project.id_project', '=', 'artefak_project.id_project')   
      ->join('versi', 'versi.id_versi', '=', 'artefak_project.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'artefak_project.id_jenis')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')  
      ->where ( 'artefak_project.id_project', '=', $cari ) 
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new ArtefakTransformer)
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
		
		$data = new artefak();
      	$data->id_project = $request->id_project;
      	$data->id_versi = $request->id_versi;
      	$data->nama_artefak = $request->nama_artefak;
      	$data->deskripsi_artefak = $request->deskripsi_artefak;
      	$data->id_jenis = $request->id_jenis;

      	$data->save();
      	// return response()->json($data);
      	// return response('sukses');
      	return response()->json([
              'url' => $data
          ]);
	}
	public function createawal(Request $request)
    {
      	header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
		header ("Content-Type: *");
		
		$data = new artefak();
      	$data->id_project = $request->id_project;
      	$data->id_versi = $request->id_versi;
      	$data->nama_artefak = $request->nama_artefak;
      	$data->deskripsi_artefak = "";
      	$data->id_jenis = $request->id_jenis;

      	$data->save();
      	// return response()->json($data);
      	// return response('sukses');
      	return response()->json([
              'url' => $data
          ]);
    }
    public function update(Request $request, $id)
    {
    	
      	header("Access-Control-Allow-Origin: *");
      	header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      	header ("Content-Type: application/json");
        
      	extract($request->json()->all());
    		$id_project = $request->id_project;
    		$id_versi = $request->id_versi;
    		$nama_artefak = $request->nama_artefak;
    		$deskripsi_artefak = $request->deskripsi_artefak;
		    $id_jenis = $request->id_jenis;

    		$data = artefak::find($id);

    	$data->id_project = $id_project;
      	$data->id_versi = $id_versi;
      	$data->nama_artefak = $nama_artefak;
      	$data->deskripsi_artefak = $deskripsi_artefak;
      	$data->id_jenis = $id_jenis;

    	$data->save();
    	return response()->json($data);
    }public function update2(Request $request, $id)
    {
      
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: application/json");
        
        extract($request->json()->all());
        $id_project = $request->id_project;
        $id_versi = $request->id_versi;
        $nama_artefak = $request->nama_artefak;
        $id_jenis = $request->id_jenis;

        $data = artefak::find($id);

        $data->id_project = $id_project;
        $data->id_versi = $id_versi;
        $data->nama_artefak = $nama_artefak;
        $data->deskripsi_artefak = '';
        $data->id_jenis = $id_jenis;

      $data->save();
      return response()->json($data);
    }
    public function destroy($id)
    {
    	header("Access-Control-Allow-Origin: *");
      	header ("Content-Type: *");
		Route::delete('barkas/relasi/{id}', function ($id) {
		});
        $data = artefak::find($id);
        $path = $data->file_artefak;
        Storage::disk('public')->delete($path);
        $data->delete();
	
	       return response()->json($data);
    }
}
