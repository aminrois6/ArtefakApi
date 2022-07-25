<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    use Notifiable;

    protected $guard = 'invite';
    protected $table = 'invite';
    protected $primaryKey = 'id_invite';
    public $timestamps = false;
    protected $guarded = [];

}
