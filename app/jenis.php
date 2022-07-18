<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    use Notifiable;

    protected $guard = 'jenis_artefak';
    protected $table = 'jenis_artefak';
    protected $primaryKey = 'id_jenis';
    public $timestamps = false;
    protected $guarded = [];

}
