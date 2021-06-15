<?php

namespace App\Models\Seguridad;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    protected $table = "giusuarios";
    public $timestamps = false;
    protected $fillable = [
        'tipide_id',
        'numide',
        'rol_id',
        'prinom',
        'secnom',
        'priape',
        'secape',
        'nickname',
        'email',
        'password',
        'reset_pass',
        'active',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
      public function rol()
    {
        //one to one inverso, el prestamo pertenece a un cliente
        return $this->belongsTo('App\Models\Seguridad\Rol');
    }
}
