<?php

namespace App\Transformers;

use App\backlog;
use League\Fractal\TransformerAbstract;

class BacklogTransformer extends TransformerAbstract
{
    public function transform(backlog $Model)
    {
        return [
                'id_backlog' => $Model->id_backlog,
                'jenis_backlog' => [
                        'id_jenis_backlog' => $Model->id_jenis_backlog,
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
                        'sdlc' => [
                            'id_sdlc' => $Model->id_sdlc,
                            'nama_sdlc' => $Model->nama_sdlc,
                        ],
                        'versi' => [
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
                            ],
                            'nama_jenis_backlog' => $Model->nama_jenis_backlog,
                 ],
                'nama_backlog' => $Model->nama_backlog,
                'isi_backlog' => $Model->isi_backlog,
                'status_backlog' => $Model->status_backlog,
                'priority_backlog' => $Model->priority_backlog,
                'order_backlog' => $Model->order_backlog,
            ];
    }
}