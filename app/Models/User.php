<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    public function channel(){
        return $this->hasOne(Channel::class);
    }
    public function properties(){
        return $this->hasMany('App\Models\Property');
    }
    public function publications(){
        return $this->hasMany('App\Models\Publication');
    }
    public function roles() 
    {
        return $this->belongsToMany(Role::class);
    }
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        return false;
       // abort(401, 'Non authorized action.');
    }
    public function getCompletedAttribute($value)
    {
        return $this->getMedia()->isEmpty() && $value;
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($role)
    {
        if ($this->roles()->get()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
    public function roleUp(){
        return $this->hasMany(RoleUp::class)->orderBy('updated_at', 'DESC');
    }
}
