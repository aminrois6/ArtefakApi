<?php

namespace App\Transformers;

use App\sdlc;
use League\Fractal\TransformerAbstract;

class SdlcTransformer extends TransformerAbstract
{
    public function transform(Sdlc $Model)
    {
        return [
            'id_sdlc' => $Model->id_sdlc,
            'nama_sdlc' => $Model->nama_sdlc,
        ];
    }
}