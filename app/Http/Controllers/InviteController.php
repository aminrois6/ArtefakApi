<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invite;
use DB;
use App\Transformers\InviteTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class InviteController extends Controller
{
    public function tampil(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");

      $data = invite::join('user', 'user.id_user', '=', 'invite.id_user1')
      ->join('user', 'user.id_user', '=', 'invite.id_user2')
      ->join('project', 'project.id_sdlc', '=', 'invite.id_project')  
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')  
      ->paginate(5);
      // return response()->json($data);
      $data = invite::all();
      // dd($data);
      return fractal()
            ->collection($data)
            ->transformWith(new InviteTransformer)
            // ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }


    public function create(Request $request)
    {
    	// extract($request->json()->all());

    	$data = new invite();

    	$data->id_user1 = $request->id_user1;
    	$data->id_user2 = $request->id_user2;
    	$data->id_project = $request->id_project;
    	$data->date_sent = $request->date_sent;
    	$data->date_accept = $request->date_accept;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	// extract($request->json()->all());
      $id_user1 = $request->id_user1;
      $id_user2 = $request->id_user2;
      $id_project = $request->id_project;
      $date_sent = $request->date_sent;
      $date_accept = $request->date_accept;

		  $data = invite::find($id);

		  $data->id_user1 = $id_user1;
    	$data->id_user2 = $id_user2;
    	$data->id_project = $id_project;
    	$data->date_sent = $date_sent;
    	$data->date_accept = $date_accept;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
      $data = invite::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
