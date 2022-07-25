<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\akses;
use DB;
use App\Transformers\AksesTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class AksesController extends Controller
{
    public function tampil(Request $request)
    {
       header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");

     $data = akses::join('role_project', 'role_project.id_role_project', '=', 'akses.id_role_project')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'akses.id_jenis')      
      ->paginate(5);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new AksesTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }


    public function create(Request $request)
    {
    	// extract($request->json()->all());

    	$data = new akses();

    	$data->id_role_project = $request->id_role_project;
    	$data->id_jenis = $request->id_jenis;
    	$data->read = $request->read;
    	$data->update = $request->update;
    	$data->delete = $request->delete;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	// extract($request->json()->all());
      $id_role_project = $request->id_role_project;
      $id_jenis = $request->id_jenis;
      $read = $request->read;
      $update = $request->update;
      $delete = $request->delete;

  		$data = akses::find($id);

  		$data->id_role_project = $id_role_project;
    	$data->id_jenis = $id_jenis;
    	$data->read = $read;
    	$data->update = $update;
    	$data->delete = $delete;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
      $data = akses::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
