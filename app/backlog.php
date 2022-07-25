<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class backlog extends Model
{
    use Notifiable;

    protected $guard = 'backlog';
    protected $table = 'backlog';
    protected $primaryKey = 'id_backlog';
    public $timestamps = false;
    protected $guarded = [];

}
