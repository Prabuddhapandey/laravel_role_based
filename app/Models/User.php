<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function getRolesList() {
        return ['admin' => 1,'Pradesh' => 2, 'Palika' => 3,'user' => 4];
    }
    
    protected $fillable=[
        'photo',
        'name',
        'email',
        'password',
        'address',
        'salary',
        'role',
        'phone',
    'created_by'
    ];
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    // protected static function boot()
    // {
    // static::creating(function ($user){
    //     $user->symbol_number=uniqid();

    // });
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

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
        'password' => 'hashed',
    ];

    public function getPhotoUrlAttribute(){
        return $this->attributes['photo']
        ? Storage::disk('public')->url($this->attributes['photo'])
        :'';
    }

    public function setPhotoAttribute($value){
        if (!empty($value)){
            $this->attributes['photo']=$value->store('Palika', 'public');
        }
    }
}
