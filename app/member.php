<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use Notifiable;

    protected $guard = 'member_project';
    protected $table = 'member_project';
    protected $primaryKey = 'id_member';
    public $timestamps = false;
    protected $guarded = [];

}
