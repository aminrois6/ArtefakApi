<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis;
use App\Transformers\JenisTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class JenisController extends Controller
{
    public function option(Request $request){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
    }
     public function tampilsemua(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");
      $data = jenis::join('sdlc', 'sdlc.id_sdlc', '=', 'jenis_artefak.id_sdlc')
      ->paginate(100);

      return fractal()
            ->collection($data)
            ->transformWith(new JenisTransformer)
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

      $cari = $request->id_sdlc;
      $data = jenis::join('sdlc', 'sdlc.id_sdlc', '=', 'jenis_artefak.id_sdlc')
      ->where ( 'jenis_artefak.id_sdlc', 'LIKE', '%' . $cari . '%' )
      ->paginate(100);

     return fractal()
            ->collection($data)
            ->transformWith(new JenisTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }

    public function create(Request $request)
    {
    	// extract($request->json()->all());

    	$data = new jenis();

      $data->nama_jenis = $request->nama_jenis;
      $data->id_sdlc = $request->id_sdlc;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	extract($request->json()->all());
      $nama_jenis = $request->nama_jenis;
      $id_sdlc = $request->id_sdlc;

	   	$data = jenis::find($id);

      $data->nama_jenis = $nama_jenis;
      $data->id_sdlc = $id_sdlc;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
      $data = jenis::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
