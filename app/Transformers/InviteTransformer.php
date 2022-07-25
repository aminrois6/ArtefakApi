<?php

namespace App\Transformers;

use App\invite;
use League\Fractal\TransformerAbstract;

class InviteTransformer extends TransformerAbstract
{
    public function transform(invite $Model)
    {
        return [
            'id_invite' => $Model->id_invite,
            'date_sent' => $Model->date_sent,
            'date_accept' => $Model->date_accept,
            'user1' => [
            	'id_user' => $Model->id_user,
            	'email_user' => $Model->email_user,
            	'password_user' => $Model->password_user,
            	'nama_user' => $Model->nama_user,
            ],
            // 'sdlc' => [
            // 	'id_sdlc' => $Model->id_sdlc,
            // 	'nama_sdlc' => $Model->nama_sdlc,
            // ]
        ];
    }
}