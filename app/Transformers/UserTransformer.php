<?php

namespace App\Transformers;

use App\users;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(users $Model)
    {
        return [
            'id_user' => $Model->id_user,
            'email_user' => $Model->email_user,
            'password_user' => $Model->password_user,
            'nama_user' => $Model->nama_user,
        ];
    }
}