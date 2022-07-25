<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class sdlc extends Model
{
    use Notifiable;

    protected $guard = 'sdlc';
    protected $table = 'sdlc';
    protected $primaryKey = 'id_sdlc';
    public $timestamps = false;
    protected $guarded = [];

}
