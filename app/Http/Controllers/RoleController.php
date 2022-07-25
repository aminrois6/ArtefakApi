<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;
use App\Transformers\RoleTransformer;

class RoleController extends Controller
{
    public function tampil(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $data = role::all();
     
      return fractal()
            ->collection($data)
            ->transformWith(new RoleTransformer)
            ->addMeta([
              ''
            ])
            ->toArray();
    }


    public function create(Request $request)
    {
    	// extract($request->json()->all());

    	$data = new role();

    	$data->nama_role_project = $request->nama_role_project;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	// extract($request->json()->all());
      $nama_role_project = $request->nama_role_project;

		  $data = role::find($id);

    	$data->nama_role_project = $nama_role_project;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
      $data = role::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
