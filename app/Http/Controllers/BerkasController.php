<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\berkas;
use DB;
use App\Transformers\BerkasTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use File;
use Storage;

class BerkasController extends Controller
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
      
      $data = berkas::join('artefak_project', 'artefak_project.id_artefak', '=', 'berkas.id_artefak')
      ->join('project', 'project.id_project', '=', 'artefak_project.id_project')    
      ->join('versi', 'versi.id_versi', '=', 'artefak_project.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'artefak_project.id_jenis')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BerkasTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }

    public function tampilawal(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $cari = $request->id_artefak;
      
      $data = berkas::join('artefak_project', 'artefak_project.id_artefak', '=', 'berkas.id_artefak')
      ->join('project', 'project.id_project', '=', 'artefak_project.id_project')    
      ->join('versi', 'versi.id_versi', '=', 'artefak_project.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'artefak_project.id_jenis') 
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->where ('berkas.id_artefak', '=', $cari) 
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BerkasTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }
    public function tampiluser(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $cari = $request->id_user;
      
      $data = berkas::join('artefak_project', 'artefak_project.id_artefak', '=', 'berkas.id_artefak')
      ->join('project', 'project.id_project', '=', 'artefak_project.id_project')    
      ->join('versi', 'versi.id_versi', '=', 'artefak_project.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'artefak_project.id_jenis') 
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->where ('project.id_user', '=', $cari) 
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BerkasTransformer)
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
      
      $data = berkas::join('artefak_project', 'artefak_project.id_artefak', '=', 'berkas.id_artefak')
      ->join('project', 'project.id_project', '=', 'artefak_project.id_project')    
      ->join('versi', 'versi.id_versi', '=', 'artefak_project.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'artefak_project.id_jenis') 
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->where ('artefak_project.id_project', '=', $cari) 
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BerkasTransformer)
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
        
      $data = new berkas();
      $path = $request->file_artefak->store('/artefak', 'public'); 
      $namafile = $request->file_artefak;
      $nama_berkas=$namafile->getClientOriginalName();
      // $ext=pathinfo($nama_berkas, PATHINFO_EXTENSION);
      // $data = new artefak();


    	$data->id_artefak = $request->id_artefak;
    	$data->nama_berkas = $nama_berkas;
    	$data->isi_berkas = $path;

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
      $nama_berkas = $request->nama_berkas;
      // $isi_berkas = $request->isi_berkas;

  		$data = berkas::find($id);

  		// $data->id_artefak = $id_artefak;
    	$data->nama_berkas = $nama_berkas;
    	// $data->isi_berkas = $isi_berkas;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: application/json");
        
      $data = berkas::find($id);
      $path = $data->isi_berkas;
      Storage::disk('public')->delete($path);
      $data->delete();
	
	  return response()->json($data);
    }

    public function destroy2(Request $request, $id)
    {
      header("Access-Control-Allow-Origin: *");
      	header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: application/json");
        
      $data = berkas::join('artefak_project', 'artefak_project.id_artefak', '=', 'berkas.id_artefak')
      ->where('berkas.id_artefak', '=', $id);
      // // $data = DB::table('berkas')
      // // ->where('id_artefak','like',"%".$id."%")
      // // return response()->json($data);
      // // $path = $data->isi_berkas;
      // // Storage::disk('public')->delete($path);
      // // $data->delete();
      // $data = berkas::where('berkas.id_artefak', '=', $id);
      $path = $data->isi_berkas;
      Storage::disk('public')->delete($path);
      $data->delete();
	
      return response()->json($data);
    }
}
