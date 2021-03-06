<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','first_name', 'last_name', 'mobile','email', 'password', 'active'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
   
   public function setPasswordAttribute($value)
   {
        $this->attributes['password'] = bcrypt($value);
   }

    public function roles()
    {
       return $this->belongsToMany(Role::class)->withTimestamps();
    }
    
   public function hasRole($name)
    {
        foreach ($this->roles as $role) {
            If($role->name == $name){
                return true;
            }
            return false;
        }
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

     public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }   

}
