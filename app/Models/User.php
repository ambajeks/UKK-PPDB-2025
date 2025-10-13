<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username','email','password','no_hp'];

    protected $hidden = ['password'];

    // relasi many-to-many role
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function hasRole($roleName)
    {
       return $this->roles()->where('name', $roleName)->exists();
    }

    public function formulir()
    {
        return $this->hasMany(FormulirPendaftaran::class, 'user_id');
    }
}
