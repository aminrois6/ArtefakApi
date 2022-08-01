<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use DB;
use App\Transformers\MemberTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class MemberController extends Controller
{
    public function option(Request $request){
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
}
    public function tampil(Request $request)
    {
       header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");

      $data = member::join('project', 'project.id_project', '=', 'member_project.id_project')
      ->join('user', 'user.id_user', '=', 'member_project.id_user')
      ->join('role_project', 'role_project.id_role_project', '=', 'member_project.id_role_project')    
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')  
      ->paginate(10);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new MemberTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }
    public function tampilmember(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $cari = $request->id_project;

      $data = member::join('project', 'project.id_project', '=', 'member_project.id_project')
      ->join('user', 'user.id_user', '=', 'member_project.id_user')
      ->join('role_project', 'role_project.id_role_project', '=', 'member_project.id_role_project')    
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->where ( 'member_project.id_project', '=', $cari)   
      ->paginate(10);

      return fractal()
            ->collection($data)
            ->transformWith(new MemberTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }
    public function tampiluser(Request $request)
    {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
      header ("Content-Type: *");

      $cari = $request->id_user;

      $data = member::join('project', 'project.id_project', '=', 'member_project.id_project')
      // ->join('user', 'user.id_user', '=', 'member_project.id_user')
      ->join('role_project', 'role_project.id_role_project', '=', 'member_project.id_role_project')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->where ('member_project.id_user', '=', $cari)   
      ->paginate(10);

      return fractal()
            ->collection($data)
            ->transformWith(new MemberTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->addMeta([
              
            ])
            ->toArray();
    }

    public function create(Request $request)
    {
    	// extract($request->json()->all());
        header("Access-Control-Allow-Origin: *");
      header ("Content-Type: application/json");

    	$data = new member();

    	$data->id_project = $request->id_project;
    	$data->id_user = $request->id_user;
    	$data->id_role_project = $request->id_role_project;

    	$data->save();
    	return response()->json($data);
    }

    public function update(Request $request, $id)
    {
    	// extract($request->json()->all());
      
      $id_project = $request->id_project;
      $id_user = $request->id_user;
      $id_role_project = $request->id_role_project;

  		$data = member::find($id);

  		$data->id_project = $id_project;
    	$data->id_user = $id_user;
    	$data->id_role_project = $id_role_project;

		$data->save();
		return response()->json($data);
    }

    public function destroy($id)
    {
        header("Access-Control-Allow-Origin: *");
      header ("Content-Type: *");
      $data = member::find($id);
      $data->delete();
	
	  return response()->json($data);
    }
}
