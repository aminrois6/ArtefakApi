<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class berkas extends Model
{
    use Notifiable;

    protected $guard = 'berkas';
    protected $table = 'berkas';
    protected $primaryKey = 'id_berkas';
    public $timestamps = false;
    protected $guarded = [];

}