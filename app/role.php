<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use Notifiable;

    protected $guard = 'role_project';
    protected $table = 'role_project';
    protected $primaryKey = 'id_role_project';
    public $timestamps = false;
    protected $guarded = [];

}
