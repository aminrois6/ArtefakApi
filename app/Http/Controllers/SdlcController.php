<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sdlc;
use App\Transformers\SdlcTransformer;
// use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class SdlcController extends Controller
{
    public function tampil(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $data = sdlc::all();
      return fractal()
            ->collection($data)
            ->transformWith(new SdlcTransformer)
            ->addMeta([
              ''
            ])
            ->toArray();
    }


    public function create(Request $request)
    {
    	// extract($request->json()->all());

    	$data = new sdlc();

    	$data->nama_sdlc = $request->nama_sdlc;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	// extract($request->json()->all());
       
      $nama_sdlc = $request->nama_sdlc;
      $data = sdlc::find($id);

    	$data->nama_sdlc = $nama_sdlc;

		  $data->save();
		  return response()->json($data);
    }

    public function destroy($id)
    {
      $data = sdlc::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
