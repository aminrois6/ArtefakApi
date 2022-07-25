<?php

namespace App\Transformers;

use App\member;
use League\Fractal\TransformerAbstract;

class MemberTransformer extends TransformerAbstract
{
    public function transform(member $Model)
    {
        return [
            'id_member' => $Model->id_member,
                'project' => [
                    'id_project' => $Model->id_project,
                    'nama_project' => $Model->nama_project,
                    // 'password_user' => $Model->password_user,
                    // 'nama_user' => $Model->nama_user,
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
                ],
                'user' => [
                	'id_user' => $Model->id_user,
                	'email_user' => $Model->email_user,
                	'password_user' => $Model->password_user,
                	'nama_user' => $Model->nama_user,
                ],
                'role_project' => [
                	'id_role_project' => $Model->id_role_project,
                	'nama_role_project' => $Model->nama_role_project,
                ]
        ];
    }
}