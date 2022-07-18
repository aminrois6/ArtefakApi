<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use Notifiable;

    protected $guard = 'user';
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $guarded = [];

    // protected $table = 'user';
    // protected $fillable = ['email_user','password_user', 'nama_user'];
}
