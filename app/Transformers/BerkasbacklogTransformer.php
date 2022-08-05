<?php

namespace App\Transformers;

use App\berkasbacklog;
use League\Fractal\TransformerAbstract;

class BerkasbacklogTransformer extends TransformerAbstract
{
    public function transform(berkasbacklog $Model)
    {
        return [
            'id_berkas_backlog' => $Model->id_berkas_backlog,
                'backlog' => [
                    'id_backlog' => $Model->id_backlog,
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
                            ]
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
                    'nama_backlog' => $Model->nama_backlog,
                    'isi_backlog' => $Model->isi_backlog,
                    'status_backlog' => $Model->status_backlog,
                    'priority_backlog' => $Model->priority_backlog,
                    'order_backlog' => $Model->order_backlog,
                ],
            'nama_berkas_backlog' => $Model->nama_berkas_backlog,
            'isi_berkas_backlog' => $Model->isi_berkas_backlog,   
        ];
    }
}
