<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'address',
        'job_name',
        'bio',
        'phone',
        'thumbnail'

    ];

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

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "worker"][$value],
        );
    }

    public function scopeFilter($query , array $filters)
    {
        $query->where('type' , 1);
        $query->when($filters['name'] ?? false , function ($query , $name){
            $query->where('name' , 'like', '%'.$name.'%');
        });

        $query->when($filters['role'] ?? false , function ($query , $role){
            $query->where('role' , 'like', '%'.$role.'%');
        });

        $query->when($filters['email'] ?? false , function ($query , $email){
            $query->where('email' ,  'like','%'.$email.'%');
        });

        $query->when($filters['phone'] ?? false , function ($query , $phone){
            $query->where('phone' , 'like', '%'.$phone.'%');
        });


        // According To His Jobs
        $query->when($filters['job'] ?? false , function ($query,$job){
                $query->where('job_name' ,'like' ,'%'.$job.'%');
        });
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function workerOrders(): HasMany
    {
        return $this->hasMany(Order::class , 'worker_id');
    }
    public function jobPhotos(): HasMany
    {
        return $this->hasMany(jobPhotos::class , 'worker_id');
    }

    public function favourites(): HasMany
    {
        return $this->hasMany(FavouriteList::class);
    }
}
