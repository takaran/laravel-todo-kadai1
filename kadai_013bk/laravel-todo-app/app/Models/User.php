<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
    // リレーションシップを設定することにより、$user->goalsと記述するだけでそのユーザーが持つ目標をすべて取得できるようになります［変数$userにはUserモデルのインスタンス（特定のユーザー）が代入されていると仮定してください］
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
