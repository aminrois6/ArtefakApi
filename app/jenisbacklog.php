<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class jenisbacklog extends Model
{
    use Notifiable;

    protected $guard = 'jenis_backlog';
    protected $table = 'jenis_backlog';
    protected $primaryKey = 'id_jenis_backlog';
    public $timestamps = false;
    protected $guarded = [];

}
