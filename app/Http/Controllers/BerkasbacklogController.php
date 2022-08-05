<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\berkasbacklog;
use DB;
use App\Transformers\BerkasbacklogTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use File;
use Storage;

class BerkasbacklogController extends Controller
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
      
      $data = berkasbacklog::join('backlog', 'backlog.id_backlog', '=', 'berkas_backlog.id_backlog')
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BerkasbacklogTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }

    public function tampilawal(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $cari = $request->id_backlog;
      
      $data = berkasbacklog::join('backlog', 'backlog.id_backlog', '=', 'berkas_backlog.id_backlog')
      ->join('jenis_backlog', 'jenis_backlog.id_jenis_backlog', '=', 'backlog.id_jenis_backlog')
      ->join('project', 'project.id_project', '=', 'jenis_backlog.id_project')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'jenis_backlog.id_sdlc')   
      ->join('versi', 'versi.id_versi', '=', 'jenis_backlog.id_versi')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      // ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->where('berkas_backlog.id_backlog', '=', $cari)
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BerkasbacklogTransformer)
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
      header ("Content-Type: application/json");
      // header ("Content-Type: *");
        
      $data = new berkasbacklog();
      $path = $request->file_artefak->store('/artefak', 'public'); 
      $namafile = $request->file_artefak;
      $nama_berkas_backlog=$namafile->getClientOriginalName();
      // $ext=pathinfo($nama_berkas, PATHINFO_EXTENSION);
      // $data = new artefak();


    	$data->id_backlog = $request->id_backlog;
    	$data->nama_berkas_backlog = $nama_berkas_backlog;
    	$data->isi_berkas_backlog = $path;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
      header("Access-Control-Allow-Origin: *");
      	header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: application/json");
        
    	extract($request->json()->all());
      // $id_artefak = $request->id_artefak;
      $nama_berkas_backlog = $request->nama_berkas_backlog;
      // $isi_berkas = $request->isi_berkas;

  		$data = berkasbacklog::find($id);

  		// $data->id_artefak = $id_artefak;
    	$data->nama_berkas_backlog = $nama_berkas_backlog;
    	// $data->isi_berkas = $isi_berkas;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: application/json");
        
      $data = berkasbacklog::find($id);
      $path = $data->isi_berkas_backlog;
      Storage::disk('public')->delete($path);
      $data->delete();
	
	  return response()->json($data);
    }

    public function destroy2($id)
    {
      header("Access-Control-Allow-Origin: *");
      	header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: application/json");
        
      $data = berkasbacklog::where('id_backlog', $id);
      $path = $data->isi_berkas_backlog;
      Storage::disk('public')->delete($path);
      $data->delete();
	
      return response()->json($data);
    }
}
