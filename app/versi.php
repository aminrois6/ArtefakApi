<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class versi extends Model
{
    use Notifiable;

    protected $guard = 'versi';
    protected $table = 'versi';
    protected $primaryKey = 'id_versi';
    public $timestamps = false;
    protected $guarded = [];

}
