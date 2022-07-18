<?php

namespace App\Transformers;

use App\project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    public function transform(project $Model)
    {
        return [
            'id_project' => $Model->id_project,
            'nama_project' => $Model->nama_project,
            'user' => [
            	'id_user' => $Model->id_user,
            	'email_user' => $Model->email_user,
            	'password_user' => $Model->password_user,
            	'nama_user' => $Model->nama_user,
            ],
            'sdlc' => [
            	'id_sdlc' => $Model->id_sdlc,
            	'nama_sdlc' => $Model->nama_sdlc,
            ]
        ];
    }
}