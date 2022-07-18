<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class akses extends Model
{
	use Notifiable;

    protected $guard = 'akses';
    protected $table = 'akses';
    protected $primaryKey = 'id_akses';
    public $timestamps = false;
    protected $guarded = [];
}