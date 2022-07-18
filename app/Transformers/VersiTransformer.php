<?php

namespace App\Transformers;

use App\versi;
use League\Fractal\TransformerAbstract;

class VersiTransformer extends TransformerAbstract
{
    public function transform(versi $Model)
    {
        return [
            'id_versi' => $Model->id_versi,
                'project' => [
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
                        ],
                ],
            'major' => $Model->major,
            'minor' => $Model->minor,
            'patch' => $Model->patch,
            'fase_release' => $Model->fase_release,
        ];
    }
}