<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class dasar extends Model
{
	use Notifiable;

    protected $guard = 'tb_katadasar';
    protected $table = 'tb_katadasar';
    protected $primaryKey = 'id_katadasar';
    public $timestamps = false;
    protected $guarded = [];
}