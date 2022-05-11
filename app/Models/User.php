<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'role_id'
    ];

    protected $guarded =[];

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
    public function canCreatePosts()
    {
        if($this->role_id === 1 || $this->role_id === 2){
            return true;
        }
        else{
            return false;
        }
    }
    public function canEdit(Post $post)
    {
        if($this->role_id === 1){
            return true;
        }
        if($this->role_id === 2 && $this->id === $post->user_id){
            return true;
        }
        else{
            return false;
        }
    }
    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function canEditComment(Comment $comment)
    {
        if($this->id === $comment->user_id){
            return true;
        }
        else{
            return false;
        }
    }
    public function isVerified(){
        if($this->email_verified_at === NULL){
            return false;
        }
        else{
            return true;
        }
    }
    public function isAdmin(){
        if($this->role_id === 1){
            return true;
        }
        else{
            return false;
        }
    }
}
