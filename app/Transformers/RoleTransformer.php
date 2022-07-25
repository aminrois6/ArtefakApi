<?php

namespace App\Transformers;

use App\role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
{
    public function transform(role $Model)
    {
        return [
            'id_role_project' => $Model->id_role_project,
            'nama_role_project' => $Model->nama_role_project,
        ];
    }
}