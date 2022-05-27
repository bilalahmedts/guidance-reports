<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Sortable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be sorted
     */

    protected $guarded = [];
    
    protected static function boot()
    {
        parent::boot();

        User::creating(function($model) {
            $model->access_key = 'Touch123';
        });
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    
     public function team()
     {
         return $this->hasOne(Team::class, 'id', 'team_id');
     }
     public function scopeSearch($query, $request){

        if ($request->has('name')) {
            if (!empty($request->name)) {
                $query = $query->where('name', 'LIKE', "%{$request->name}%");
            }
        }
        if ($request->has('email')) {
            if (!empty($request->email)) {
                $query = $query->where('email', 'LIKE', "%{$request->email}%");
            }
        }
        if ($request->has('team_id')) {
            if (!empty($request->team_id)) {
                $query = $query->where('team_id', 'LIKE', "%{$request->team_id}%");
            }
        }

        return $query;
    }
}
