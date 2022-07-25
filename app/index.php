<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class index extends Model
{
    use Notifiable;

    protected $guard = 'index';
    protected $table = 'index';
    protected $primaryKey = 'id_index';
    public $timestamps = false;
    protected $guarded = [];

}
