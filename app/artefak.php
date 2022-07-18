<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class artefak extends Model
{
    use Notifiable;

    protected $guard = 'artefak_project';
    protected $table = 'artefak_project';
    protected $primaryKey = 'id_artefak';
    public $timestamps = false;
    protected $guarded = [];

}
