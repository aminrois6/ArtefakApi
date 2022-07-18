<?php

namespace App\Transformers;

use App\akses;
use League\Fractal\TransformerAbstract;

class AksesTransformer extends TransformerAbstract
{
    public function transform(akses $Model)
    {
        return [
            'id_akses' => $Model->id_akses,
            'read' => $Model->read,
            'update' => $Model->update,
            'delete' => $Model->delete,
                'role_project' => [
                	'id_role_project' => $Model->id_role_project,
                	'nama_role_project' => $Model->nama_role_project,
                ],
                'jenis_artefak' => [
                    'id_jenis' => $Model->id_jenis,
                    'nama_jenis' => $Model->nama_jenis,
                ]
        ];
    }
}