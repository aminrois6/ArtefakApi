<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use Notifiable;

    protected $guard = 'project';
    protected $table = 'project';
    protected $primaryKey = 'id_project';
    public $timestamps = false;
    protected $guarded = [];

}
