<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class berkasbacklog extends Model
{
    use Notifiable;

    protected $guard = 'berkas_backlog';
    protected $table = 'berkas_backlog';
    protected $primaryKey = 'id_berkas_backlog';
    public $timestamps = false;
    protected $guarded = [];

}