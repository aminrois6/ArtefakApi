<?php

namespace App\Transformers;

use App\jenis;
use League\Fractal\TransformerAbstract;

class JenisTransformer extends TransformerAbstract
{
    public function transform(Jenis $Model)
    {
        return [
            'id_jenis' => $Model->id_jenis,
            'nama_jenis' => $Model->nama_jenis,
            'sdlc' => [
            	'id_sdlc' => $Model->id_sdlc,
            	'nama_sdlc' => $Model->nama_sdlc,
            ],
        ];
    }
}