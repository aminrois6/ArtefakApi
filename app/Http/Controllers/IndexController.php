<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\index;
use DB;
use App\Transformers\IndexTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class IndexController extends Controller
{
    public function tampil(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      
      $data = index::join('artefak_project', 'artefak_project.id_artefak', '=', 'index.id_artefak')
      ->join('project', 'project.id_project', '=', 'artefak_project.id_project')    
      ->join('versi', 'versi.id_versi', '=', 'artefak_project.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'artefak_project.id_jenis')      
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->join('user', 'user.id_user', '=', 'project.id_user')  
      ->paginate(5);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new IndexTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }


    public function create(Request $request)
    {
    	// extract($request->json()->all());

    	$data = new index();

    	$data->id_artefak = $request->id_artefak;
    	$data->kata = $request->kata;
    	$data->frek = $request->frek;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	// extract($request->json()->all());
      $id_artefak = $request->id_artefak;
      $kata = $request->kata;
      $frek = $request->frek;

  		$data = index::find($id);

  		$data->id_artefak = $id_artefak;
    	$data->kata = $kata;
    	$data->frek = $frek;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
      $data = index::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
