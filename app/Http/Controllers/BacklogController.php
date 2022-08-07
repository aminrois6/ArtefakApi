<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\backlog;
use DB;
use App\Transformers\BacklogTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class BacklogController extends Controller
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

      $data = backlog::join('jenis_backlog', 'jenis_backlog.id_jenis_backlog', '=', 'backlog.id_jenis_backlog')
      // ->join('project', 'project.id_project', '=', 'backlog.id_project')
      ->join('project', 'project.id_project', '=', 'jenis_backlog.id_project')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'jenis_backlog.id_sdlc')   
      ->join('versi', 'versi.id_versi', '=', 'jenis_backlog.id_versi')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BacklogTransformer)
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
      
      $data = backlog::join('jenis_backlog', 'jenis_backlog.id_jenis_backlog', '=', 'backlog.id_jenis_backlog')
      ->join('project', 'project.id_project', '=', 'jenis_backlog.id_project')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'jenis_backlog.id_sdlc')   
      ->join('versi', 'versi.id_versi', '=', 'jenis_backlog.id_versi')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->where ( 'jenis_backlog.id_project', '=', $cari ) 
      ->paginate(100);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BacklogTransformer)
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
      
      $data = backlog::join('jenis_backlog', 'jenis_backlog.id_jenis_backlog', '=', 'backlog.id_jenis_backlog')
      ->join('project', 'project.id_project', '=', 'jenis_backlog.id_project')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'jenis_backlog.id_sdlc')   
      ->join('versi', 'versi.id_versi', '=', 'jenis_backlog.id_versi')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->where ( 'project.id_user', '=', $cari ) 
      ->paginate(1000);
      // return response()->json($data);

      return fractal()
            ->collection($data)
            ->transformWith(new BacklogTransformer)
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
        
        $data = new backlog();
        $data->id_jenis_backlog = $request->id_jenis_backlog;
        $data->nama_backlog = $request->nama_backlog;
        $data->isi_backlog = $request->isi_backlog;
        $data->status_backlog = $request->status_backlog;
        $data->priority_backlog = $request->priority_backlog;
        $data->order_backlog = $request->order_backlog;

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
        
        $data = new backlog();
        $data->id_jenis_backlog = $request->id_jenis_backlog;
        $data->nama_backlog = $request->nama_backlog;
        $data->isi_backlog = "";
        $data->status_backlog = "";
        $data->priority_backlog = "";
        $data->order_backlog = "";

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
            $id_jenis_backlog = $request->id_jenis_backlog;
            $nama_backlog = $request->nama_backlog;
            $isi_backlog = $request->isi_backlog;
            $data = backlog::find($id);

            $data->id_jenis_backlog = $id_jenis_backlog;
            $data->nama_backlog = $nama_backlog;
            $data->isi_backlog = $isi_backlog;
            $data->status_backlog = "";
            $data->priority_backlog = "";
            $data->order_backlog = "";

        $data->save();
        return response()->json($data);
    }
    public function update2(Request $request, $id)
    {
        
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
        header ("Content-Type: application/json");
        
        extract($request->json()->all());
            $id_jenis_backlog = $request->id_jenis_backlog;
            $nama_backlog = $request->nama_backlog;

            $data = backlog::find($id);

            $data->id_jenis_backlog = $id_jenis_backlog;
            $data->nama_backlog = $nama_backlog;
            $data->isi_backlog = "";
            $data->status_backlog = "";
            $data->priority_backlog = "";
            $data->order_backlog = "";

        $data->save();
        return response()->json($data);
    }
    public function destroy($id)
    {
      $data = backlog::find($id);
      $data->delete();
    
      return response()->json($data);
    }
}
