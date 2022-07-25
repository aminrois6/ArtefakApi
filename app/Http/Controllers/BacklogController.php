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

      $data = backlog::join('project', 'project.id_project', '=', 'backlog.id_project')   
      ->join('versi', 'versi.id_versi', '=', 'backlog.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'backlog.id_jenis')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
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
      
      $data = backlog::join('project', 'project.id_project', '=', 'backlog.id_project')   
      ->join('versi', 'versi.id_versi', '=', 'backlog.id_versi')
      ->join('jenis_artefak', 'jenis_artefak.id_jenis', '=', 'backlog.id_jenis')
      ->join('user', 'user.id_user', '=', 'project.id_user')
      ->join('sdlc', 'sdlc.id_sdlc', '=', 'project.id_sdlc')
      ->where ( 'backlog.id_project', '=', $cari ) 
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
    public function create(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
            header ("Content-Type: *");
        
        $data = new backlog();
        $data->id_project = $request->id_project;
        $data->id_versi = $request->id_versi;
        $data->isi_backlog = $request->isi_backlog;
        $data->status_backlog = $request->status_backlog;
        $data->jenis_backlog = $request->jenis_backlog;
        $data->priority_backlog = $request->priority_backlog;
        $data->order_backlog = $request->order_backlog;
        $data->id_jenis = $request->id_jenis;

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
        $data->id_project = $request->id_project;
        $data->id_versi = $request->id_versi;
        $data->isi_backlog = $request->isi_backlog;
        $data->status_backlog = $request->status_backlog;
        $data->jenis_backlog = $request->jenis_backlog;
        $data->priority_backlog = $request->priority_backlog;
        $data->order_backlog = $request->order_backlog;
        $data->id_jenis = $request->id_jenis;

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
            $id_project = $request->id_project;
            $id_versi = $request->id_versi;
            $isi_backlog = $request->isi_backlog;
            $status_backlog = $request->status_backlog;
            $jenis_backlog = $request->jenis_backlog;
            $priority_backlog = $request->priority_backlog;
            $order_backlog = $request->order_backlog;
            $id_jenis = $request->id_jenis;

            $data = backlog::find($id);

            $data->id_project = $id_project;
            $data->id_versi = $id_versi;
            $data->isi_backlog = $isi_backlog;
            $data->status_backlog = $status_backlog;
            $data->jenis_backlog = $jenis_backlog;
            $data->priority_backlog = $priority;
            $data->order_backlog = $order_backlog;
            $data->id_jenis = $id_jenis;

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
